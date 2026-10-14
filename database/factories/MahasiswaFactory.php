<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Mahasiswa> */
class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    public function definition(): array
    {
        return [
            'nim' => fake()->unique()->numerify('##/######/SV/#####'),
            'nama' => fake()->name(),
            'prodi' => fake()->randomElement(['Teknologi Rekayasa Perangkat Lunak', 'Teknik Informatika', 'Sistem Informasi']),
        ];
    }
}
