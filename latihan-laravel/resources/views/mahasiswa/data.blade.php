@extends('layouts.app')

@section('judul', 'Data Mahasiswa')

@section('konten')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Data Mahasiswa</h1>
    <a href="{{ route('mahasiswa.top-tk') }}" class="btn btn-outline-primary">
         Top 10 IPK Teknik Komputer
    </a>
</div>

@if (session('sukses'))
    <div class="alert alert-success">{{ session('sukses') }}</div>
@endif

<table class="table table-striped bg-white align-middle shadow-sm rounded">
    <thead class="table-dark">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>IPK</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarMahasiswa as $mahasiswa)
            <tr>
                <td><strong>{{ $mahasiswa->nim }}</strong></td>
                <td>{{ $mahasiswa->nama }}</td>
                <td><span class="badge bg-info text-dark">{{ $mahasiswa->programStudi->nama }}</span></td>
                <td>{{ $mahasiswa->angkatan }}</td>
                <td><span class="badge bg-success">{{ number_format($mahasiswa->ipk, 2) }}</span></td>
                <td>
                    <a href="{{ route('mahasiswa.detail', $mahasiswa->id) }}" class="btn btn-sm btn-primary">
                        Detail KRS & Nilai
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Data mahasiswa belum tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $daftarMahasiswa->links() }}
</div>
@endsection
