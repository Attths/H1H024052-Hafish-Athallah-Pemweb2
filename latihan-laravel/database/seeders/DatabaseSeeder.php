<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\ProgramStudi;
use Database\Seeders\MatakuliahSeeder;
use Database\Seeders\ProgramStudiSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProgramStudiSeeder::class,
            MatakuliahSeeder::class,
        ]);

        $prodis = ProgramStudi::all();
        $matakuliahs = Matakuliah::all();
        $grades = ['A', 'AB', 'B', 'BC', 'C'];

        // Buat 30 mahasiswa dengan sebaran prodi acak
        $mahasiswas = Mahasiswa::factory()->count(30)->make()->each(function ($mhs) use ($prodis) {
            $mhs->program_studi_id = $prodis->random()->id;
            $mhs->save();
        });

        // Hubungkan setiap mahasiswa ke 3-5 matakuliah beserta nilainya (Many to Many Pivot)
        foreach ($mahasiswas as $mhs) {
            $randomMatkul = $matakuliahs->random(rand(3, 5));
            foreach ($randomMatkul as $mk) {
                $mhs->matakuliahs()->attach($mk->id, [
                    'nilai' => $grades[array_rand($grades)],
                ]);
            }
        }
    }
}
