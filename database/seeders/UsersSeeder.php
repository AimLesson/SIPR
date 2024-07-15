<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@kominfo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Password should be hashed
            'remember_token' => Str::random(10),
            'current_team_id' => null,
            'profile_photo_path' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('password_reset_tokens')->insert([
            'email' => 'admin@kominfo.com',
            'token' => Str::random(60),
            'created_at' => now(),
        ]);

        DB::table('sessions')->insert([
            'id' => Str::uuid(),
            'user_id' => 1, // Assuming this is the first user inserted
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'payload' => Str::random(100), // This should be a real session payload
            'last_activity' => now()->timestamp,
        ]);
    }
}
