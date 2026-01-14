<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactory extends Factory
{
    protected $model = \App\Models\Dokter::class;

    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'spesialis' => $this->faker->randomElement([
                'Umum',
                'Anak',
                'Gigi',
                'Kandungan',
                'Bedah',
                'Jantung',
                'Mata',
                'THT',
                'Kulit',
                'Saraf',
                'Paru'
            ]),
        ];
    }
}
