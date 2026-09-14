<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $semuaMatakuliah = [
            ['kode' => 'TK201', 'nama' => 'Pemrograman Web II', 'sks' => 3],
            ['kode' => 'TK202', 'nama' => 'Jaringan Komputer', 'sks' => 3],
            ['kode' => 'TK203', 'nama' => 'Sistem Mikroprosesor', 'sks' => 4],
            ['kode' => 'TK204', 'nama' => 'Basis Data', 'sks' => 2],
            ['kode' => 'TK205', 'nama' => 'Rekayasa Perangkat Lunak', 'sks' => 3],
        ];

        $kataKunci = $request->query('q', '');
        $daftarMatakuliah = [];

        if ($kataKunci == '') {
            $daftarMatakuliah = $semuaMatakuliah;
        } else {
            foreach ($semuaMatakuliah as $mk) {
                if (stripos($mk['nama'], $kataKunci) !== false || stripos($mk['kode'], $kataKunci) !== false) {
                    $daftarMatakuliah[] = $mk;
                }
            }
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $daftarMatakuliah,
            'kataKunci' => $kataKunci,
        ]);
    }

    public function show(string $kode)
    {
        $semuaMatakuliah = [
            ['kode' => 'TK201', 'nama' => 'Pemrograman Web II', 'sks' => 3],
            ['kode' => 'TK202', 'nama' => 'Jaringan Komputer', 'sks' => 3],
            ['kode' => 'TK203', 'nama' => 'Sistem Mikroprosesor', 'sks' => 4],
            ['kode' => 'TK204', 'nama' => 'Basis Data', 'sks' => 2],
            ['kode' => 'TK205', 'nama' => 'Rekayasa Perangkat Lunak', 'sks' => 3],
        ];

        $matakuliah = null;

        foreach ($semuaMatakuliah as $mk) {
            if ($mk['kode'] == $kode) {
                $matakuliah = $mk;
                break;
            }
        }

        return view('matakuliah.show', ['matakuliah' => $matakuliah, 'kode' => $kode]);
    }
}