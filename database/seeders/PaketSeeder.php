<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_paket' => '1',
                'nama_paket' => 'Private I',
                'fitur' => json_encode(['For 1 Graduated', '30 Minute Photo Session', 'Unlimited Shots','15 Photo Edited','All File on G-Drive *Expired 14 Day','Location on Campus *If outside campus, additional fees apply']),
                'kp_id' => '1',
            ],[
                'id_paket' => '2',
                'nama_paket' => 'Private II',
                'fitur' => json_encode(['For 1 Graduated', '1 Hours Photo Session', 'Unlimited Shots','Family & Guest Photo Session','25 Photo Edited','All File on G-Drive *Expired 14 Day','Location on Campus *If outside campus, additional fees apply']),
                'kp_id' => '1',
            ],[
                'id_paket' => '3',
                'nama_paket' => 'Private III',
                'fitur' => json_encode(['For 1 Graduated', '90 Minute Photo Session', 'Unlimited Shots','Family & Guest Photo Session','45 Photo Edited','All File on G-Drive *Expired 14 Day','Location on Campus *If outside campus, additional fees apply']),
                'kp_id' => '1',
            ],
        ];

        foreach ($data as $item) {
            DB::table('paket')->insert([
                'id_paket' => $item['id_paket'],
                'nama_paket' => $item['nama_paket'],
                'fitur' => $item['fitur'],
                'kp_id' => $item['kp_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
