@extends('mahasiswa.layout')

@section('title', 'Data Mahasiswa')
@section('heading', 'Data Mahasiswa')

@section('content')
    <a class="btn" href="{{ route('mahasiswa.create') }}">+ Tambah</a>

    <table>
        <thead>
            <tr><th>NIM</th><th>Nama</th><th>Prodi</th><th>Aksi</th></tr>
        </thead>
        <tbody>
        @forelse ($daftar as $m)
            <tr>
                <td>{{ $m->nim }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->prodi }}</td>
                <td>
                    <a class="btn" href="{{ route('mahasiswa.edit', $m) }}">Edit</a>
                    <form method="POST" action="{{ route('mahasiswa.destroy', $m) }}" style="display:inline"
                          onsubmit="return confirm('Hapus data ini?')">
                        @csrf @method('DELETE')
                        <button class="btn danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">Belum ada data.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
