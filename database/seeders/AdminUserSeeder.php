<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@leylafikirsokak.com',
            'password' => Hash::make('142146'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'admin',
            'is_admin' => true
        ]);
    }
}
