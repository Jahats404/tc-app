<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'harga' => 300000,
                'golongan' => 'W1',
                'paket_id' => '1',
            ],
            [
                'harga' => 350000,
                'golongan' => 'W2',
                'paket_id' => '1',
            ],
            [
                'harga' => 400000,
                'golongan' => 'W1',
                'paket_id' => '2',
            ],
            [
                'harga' => 550000,
                'golongan' => 'W2',
                'paket_id' => '2',
            ],
            [
                'harga' => 750000,
                'golongan' => 'W1',
                'paket_id' => '3',
            ],
            [
                'harga' => 850000,
                'golongan' => 'W2',
                'paket_id' => '3',
            ],
        ];

        foreach ($data as $item) {
            DB::table('harga_paket')->insert([
                'id_harga_paket' => Str::uuid(),
                'harga' => $item['harga'],
                'golongan' => $item['golongan'],
                'paket_id' => $item['paket_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
