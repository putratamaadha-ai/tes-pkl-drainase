<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kecamatan')->insert([
            [
                'id' => 1,
                'nama_kecamatan' => 'Loa Janan Ilir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama_kecamatan' => 'Sambutan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}