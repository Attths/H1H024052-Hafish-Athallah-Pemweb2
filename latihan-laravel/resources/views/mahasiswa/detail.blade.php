@extends('layouts.app')

@section('judul', 'Detail Mahasiswa - ' . $mahasiswa->nama)

@section('konten')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Detail Mahasiswa & Transkrip Matakuliah</h1>
    <a href="{{ route('mahasiswa.data') }}" class="btn btn-secondary">
        &larr; Kembali ke Data Mahasiswa
    </a>
</div>

<div class="row g-4 mb-4">
    <!-- Informasi Mahasiswa -->
    <div class="col-md-5">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-dark text-white fw-bold">
                Informasi Biodata Mahasiswa
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th class="ps-0" style="width: 35%">NIM</th>
                        <td>: <strong>{{ $mahasiswa->nim }}</strong></td>
                    </tr>
                    <tr>
                        <th class="ps-0">Nama Lengkap</th>
                        <td>: {{ $mahasiswa->nama }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0">Email</th>
                        <td>: {{ $mahasiswa->email }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0">Program Studi</th>
                        <td>: <span class="badge bg-info text-dark">{{ $mahasiswa->programStudi->nama }} ({{ $mahasiswa->programStudi->jenjang }})</span></td>
                    </tr>
                    <tr>
                        <th class="ps-0">Angkatan</th>
                        <td>: {{ $mahasiswa->angkatan }}</td>
                    </tr>
                    <tr>
                        <th class="ps-0">IPK</th>
                        <td>: <span class="badge bg-success fs-6">{{ number_format($mahasiswa->ipk, 2) }}</span></td>
                    </tr>
                    <tr>
                        <th class="ps-0">Status</th>
                        <td>:
                            @if ($mahasiswa->aktif)
                                <span class="badge bg-primary">Aktif</span>
                            @else
                                <span class="badge bg-danger">Non-Aktif</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Ringkasan Akademik -->
    <div class="col-md-7">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-primary text-white fw-bold">
                Daftar Matakuliah yang Diambil (Relasi Many-to-Many)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Kode</th>
                                <th>Nama Matakuliah</th>
                                <th class="text-center">SKS</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswa->matakuliahs as $index => $matkul)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $matkul->kode }}</strong></td>
                                    <td>{{ $matkul->nama }}</td>
                                    <td class="text-center">
                                        <x-badge-sks :sks="$matkul->sks" />
                                    </td>
                                    <td class="text-center">Semester {{ $matkul->semester }}</td>
                                    <td class="text-center">
                                        @php
                                            $badgeClass = match($matkul->pivot->nilai) {
                                                'A' => 'bg-success',
                                                'AB' => 'bg-primary',
                                                'B' => 'bg-info text-dark',
                                                'BC' => 'bg-warning text-dark',
                                                'C' => 'bg-secondary',
                                                default => 'bg-dark'
                                            };
                                        @endphp
                                        <span class="badge {{ $badgeClass }} px-3 py-1 fs-6 fw-bold">
                                            {{ $matkul->pivot->nilai ?? '-' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">
                                        Mahasiswa ini belum mengambil matakuliah apapun.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        @if ($mahasiswa->matakuliahs->count() > 0)
                            <tfoot class="table-light fw-bold">
                                <tr>
                                    <td colspan="3" class="text-end">Total SKS Diambil:</td>
                                    <td class="text-center">{{ $mahasiswa->matakuliahs->sum('sks') }} SKS</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
