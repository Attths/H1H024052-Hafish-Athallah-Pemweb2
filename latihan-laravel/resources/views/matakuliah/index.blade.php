@extends('layouts.app')

@section('judul', 'Daftar Matakuliah')

@section('konten')
<h1 class="h3 mb-4">Daftar Matakuliah</h1>

<form method="GET" action="{{ route('matakuliah.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Cari matakuliah..." value="{{ $kataKunci ?? '' }}">
        <button class="btn btn-primary" type="submit">Cari</button>
    </div>
</form>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarMatakuliah as $matkul)
            <tr>
                <td>{{ $matkul['kode'] }}</td>
                <td>{{ $matkul['nama'] }}</td>
                <td><x-badge-sks :sks="$matkul['sks']" /></td>
                <td>
                    <a href="{{ route('matakuliah.show', $matkul['kode']) }}" class="btn btn-sm btn-primary">
                        Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Data belum tersedia</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection