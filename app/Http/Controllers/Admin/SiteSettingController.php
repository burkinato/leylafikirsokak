<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_title' => 'required|string|max:255',
            'site_slogan' => 'nullable|string|max:255',
            'default_language' => 'required|string|max:10',
            'timezone' => 'required|string|max:50',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'site_favicon' => 'nullable|image|mimes:ico,png|max:2048',
        ]);

        $settings = SiteSetting::first();

        if (!$settings) {
            $settings = new SiteSetting();
        }

        // Dosya Yükleme İşlemleri
        if ($request->hasFile('site_logo')) {
            $settings->site_logo = $request->file('site_logo')->store('logos', 'public');
        }

        if ($request->hasFile('site_favicon')) {
            $settings->site_favicon = $request->file('site_favicon')->store('favicons', 'public');
        }

        // Diğer Alanları Güncelle
        $settings->fill($request->only([
            'site_title',
            'site_slogan',
            'default_language',
            'timezone',
        ]));

        $settings->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Site ayarları başarıyla güncellendi!',
        ]);
    }
}
