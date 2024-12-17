<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first(); // İlk kaydı alıyoruz
        return view('admin.contact_info.index', compact('contactInfo'));
    }

    public function update(Request $request)
    {
        // Veriyi doğrulama
        $validated = $request->validate([
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'social_links' => 'nullable|array',
        ]);

        // İlk iletişim bilgisini al
        $contactInfo = ContactInfo::first();

        if (!$contactInfo) {
            $contactInfo = new ContactInfo(); // Eğer veri yoksa yeni bir kayıt oluştur
        }

        // Sosyal medya linklerini JSON formatında kaydediyoruz
        $contactInfo->social_links = json_encode($request->input('social_links'));

        // Veriyi güncelliyoruz
        $contactInfo->fill($validated);
        $contactInfo->save();

        return response()->json([
            'status' => 'success',
            'message' => 'İletişim bilgileri başarıyla güncellendi!',
        ]);
    }
}