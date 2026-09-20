@extends('layouts.app')

@section('judul', 'Top 10 IPK Mahasiswa Teknik Komputer')

@section('konten')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Top 10 IPK Tertinggi Mahasiswa Teknik Komputer</h1>
    </div>
    <a href="{{ route('mahasiswa.data') }}" class="btn btn-secondary">
        &larr; Kembali ke Data Mahasiswa
    </a>
</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span class="fw-bold"> Peringkat Akademik Program Studi Teknik Komputer</span>
        <span class="badge bg-light text-primary fw-semibold">{{ $mahasiswas->count() }} Mahasiswa</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-center" style="width: 8%">Peringkat</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Program Studi</th>
                        <th class="text-center">Angkatan</th>
                        <th class="text-center">IPK</th>
                        <th class="text-center" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $index => $mhs)
                        <tr>
                            <td class="text-center fw-bold">
                                @if ($index === 0)
                                    <span class="badge bg-warning text-dark fs-6"> #1</span>
                                @elseif ($index === 1)
                                    <span class="badge bg-secondary text-white fs-6"> #2</span>
                                @elseif ($index === 2)
                                    <span class="badge bg-danger text-white fs-6"> #3</span>
                                @else
                                    <span class="badge bg-light text-dark border">#{{ $index + 1 }}</span>
                                @endif
                            </td>
                            <td><strong>{{ $mhs->nim }}</strong></td>
                            <td>{{ $mhs->nama }}</td>
                            <td><span class="badge bg-info text-dark">{{ $mhs->programStudi->nama }}</span></td>
                            <td class="text-center">{{ $mhs->angkatan }}</td>
                            <td class="text-center">
                                <span class="badge bg-success fs-6 fw-bold px-3 py-1">
                                    {{ number_format($mhs->ipk, 2) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('mahasiswa.detail', $mhs->id) }}" class="btn btn-sm btn-outline-primary">
                                    Lihat Detail & KRS
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                Tidak ada data mahasiswa Teknik Komputer yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
