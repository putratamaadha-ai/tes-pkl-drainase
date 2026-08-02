<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1. insert kecamatan loa janan ilir
        $loaJananIlir = DB::table('kecamatan')->insertGetId([
            'nama_kecamatan' => 'Loa Janan Ilir',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kelurahan')->insert([
            ['kecamatan_id' => $loaJananIlir, 'nama_kelurahan' => 'Harapan Baru', 'created_at' => now(), 'updated_at' => now()],
            ['kecamatan_id' => $loaJananIlir, 'nama_kelurahan' => 'Rapak Dalam', 'created_at' => now(), 'updated_at' => now()],
            ['kecamatan_id' => $loaJananIlir, 'nama_kelurahan' => 'Simpang Tiga', 'created_at' => now(), 'updated_at' => now()],
            ['kecamatan_id' => $loaJananIlir, 'nama_kelurahan' => 'Tani Aman', 'created_at' => now(), 'updated_at' => now()],
        ]);

        //2. insert kecamatan sambutan
        $sambutan = DB::table('kecamatan')->insertGetId([
            'nama_kecamatan' => 'Sambutan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('kelurahan')->insert([
            ['kecamatan_id' => $sambutan, 'nama_kelurahan' => 'Sindang Sari', 'created_at' => now(), 'updated_at' => now()],
            ['kecamatan_id' => $sambutan, 'nama_kelurahan' => 'Sungai Kapih', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
