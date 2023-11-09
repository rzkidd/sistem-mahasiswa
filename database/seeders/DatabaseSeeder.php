<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        for ($i = 0; $i < 10; $i++) {
            $tgl_lahir = fake()->date('Y-m-d');
            \App\Models\Mahasiswa::factory()->create([
                'NIM' => 'M052000' . $i,
                'nama' => fake()->name,
                'alamat' => fake()->address,
                'tanggal_lahir' => $tgl_lahir,
                'gender' => fake()->randomElement(['L', 'P']),
                'usia'=> fake()->numberBetween(19, 21),
            ]);
        }
    }
}
