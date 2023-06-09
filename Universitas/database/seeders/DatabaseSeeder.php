<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (range(1, 99) as $number) {
            Mahasiswa::create([
                'npm' => '212525'. $number,
                'nama' => fake()->name(),
                'tanggal_lahir' => fake()->date($format = 'Y-m-d', $max = 'now'),
                'kota_lahir' => fake()->state(),
                'foto' => '2024250039.png',
                'prodi_id' => '995c1580-0b47-407a-b0a3-34524b1ee160',

            ]);
        }
        $this->call([
            FakultasSeeder::class
        ]);
    }
}
