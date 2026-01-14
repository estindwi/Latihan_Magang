<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
     protected $model = \App\Models\Pasien::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
         return [
        'nik' => $this->faker->unique()->regexify('[0-9]{16}'),
        'nama' => $this->faker->name(),
        'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
        'tempat_lahir' => $this->faker->city(), // ⬅️ WAJIB
        'tanggal_lahir' => $this->faker
            ->dateTimeBetween('-80 years', '-1 years')
            ->format('Y-m-d'),
        'alamat' => $this->faker->address(),
        'no_hp' => $this->faker->phoneNumber(),
    ];
}
}

