<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarMatakuliah = [
            ['kode' => 'TK201', 'nama' => 'Pemrograman Web II', 'sks' => 3, 'semester' => 4],
            ['kode' => 'TK202', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 4],
            ['kode' => 'TK203', 'nama' => 'Sistem Mikroprosesor', 'sks' => 4, 'semester' => 4],
            ['kode' => 'TK204', 'nama' => 'Basis Data', 'sks' => 2, 'semester' => 3],
            ['kode' => 'TK205', 'nama' => 'Rekayasa Perangkat Lunak', 'sks' => 3, 'semester' => 5],
            ['kode' => 'TK206', 'nama' => 'Kecerdasan Buatan', 'sks' => 3, 'semester' => 5],
            ['kode' => 'TK207', 'nama' => 'Sistem Operasi', 'sks' => 3, 'semester' => 3],
            ['kode' => 'TK208', 'nama' => 'Keamanan Siber', 'sks' => 3, 'semester' => 6],
            ['kode' => 'TK209', 'nama' => 'Pengolahan Citra Digital', 'sks' => 3, 'semester' => 6],
            ['kode' => 'TK210', 'nama' => 'Pemrograman Berorientasi Objek', 'sks' => 3, 'semester' => 3],
        ];

        foreach ($daftarMatakuliah as $item) {
            Matakuliah::create($item);
        }
    }
}
