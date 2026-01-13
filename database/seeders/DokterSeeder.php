<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $dokters = [
            [
                'nama' => 'dr. Andi Wijaya',
                'spesialis' => 'Penyakit Dalam',
            ],
            [
                'nama' => 'dr. Siti Aisyah',
                'spesialis' => 'Anak',
            ],
            [
                'nama' => 'dr. Budi Santoso',
                'spesialis' => 'Bedah',
            ],
            [
                'nama' => 'dr. Rina Lestari',
                'spesialis' => 'Kandungan',
            ],
            [
                'nama' => 'dr. Ahmad Fauzi',
                'spesialis' => 'Umum',
            ],
        ];

        foreach ($dokters as $dokter) {
            Dokter::create($dokter);
        }
        Dokter::factory()->count(94)->create();
    }
}
