<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'nama_ruang' => 'Conference Room',
                'image' => 'path/to/image1.jpg',
                'deskripsi' => 'A large room for meetings and conferences.',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'Meeting Room',
                'image' => 'path/to/image2.jpg',
                'deskripsi' => 'A small room for team meetings and discussions.',
                'status' => 'Tidak Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_ruang' => 'Workshop Room',
                'image' => 'path/to/image3.jpg',
                'deskripsi' => 'A medium-sized room for workshops and training sessions.',
                'status' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
