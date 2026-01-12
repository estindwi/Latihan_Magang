<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pasiens')->insert([
            [
                'nik' => '3509012201050001',
                'nama' => 'Siti Aminah',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Madiun',
                'tanggal_lahir' => '2005-11-22',
                'alamat' => 'Jl. Merpati No. 12, Madiun',
                'no_hp' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3509011509980002',
                'nama' => 'Budi Santoso',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Ngawi',
                'tanggal_lahir' => '1998-09-15',
                'alamat' => 'Jl. Kenanga No. 5, Ngawi',
                'no_hp' => '082233445566',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '3509013007020003',
                'nama' => 'Rina Wulandari',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Ponorogo',
                'tanggal_lahir' => '2002-07-30',
                'alamat' => 'Jl. Anggrek No. 8, Ponorogo',
                'no_hp' => '085712345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
