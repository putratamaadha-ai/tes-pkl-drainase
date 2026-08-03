<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelurahan')->insert([
            [
                'kecamatan_id' => 1,
                'nama_kelurahan' => 'Harapan Baru',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kecamatan_id' => 1,
                'nama_kelurahan' => 'Rapak Dalam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kecamatan_id' => 1,
                'nama_kelurahan' => 'Simpang Tiga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kecamatan_id' => 1,
                'nama_kelurahan' => 'Tani Aman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kecamatan_id' => 2,
                'nama_kelurahan' => 'Sindang Sari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kecamatan_id' => 2,
                'nama_kelurahan' => 'Sungai Kapih',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}