<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiteSettingSeeder extends Seeder
{
    public function run()
    {
        DB::table('site_settings')->insert([
            'site_title' => 'My Test Site ' . Str::random(5),
            'site_slogan' => 'Sizin için en iyisi',
            'default_language' => 'tr',
            'timezone' => 'Europe/Istanbul',
            'site_logo' => 'logos/default_logo.png',
            'site_favicon' => 'favicons/default_favicon.ico',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
