<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $rooms = DB::table('rooms')->pluck('id', 'nama_ruang')->all();
        $departments = ['Rendal', 'LITBANG', 'Ekonomi', 'PPM', 'Sekretariat'];
        $statuses = ['Disetujui', 'Tidak Disetujui'];

        for ($i = 0; $i < 20; $i++) {
            $randomRoom = array_rand($rooms);
            DB::table('events')->insert([
                'nama_penanggungjawab' => $faker->name,
                'acara' => $faker->sentence(3),
                'id_rooms' => $rooms[$randomRoom],
                'nama_rooms' => $randomRoom,
                'asalbidang' => $faker->randomElement($departments),
                'date' => $faker->date,
                'start' => $faker->time($format = 'H:i:s', $max = 'now'),
                'finish' => $faker->time($format = 'H:i:s', $max = 'now'),
                'status' => $faker->randomElement($statuses),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
