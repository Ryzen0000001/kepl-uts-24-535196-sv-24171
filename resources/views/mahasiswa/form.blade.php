@extends('mahasiswa.layout')

@php($edit = $mahasiswa->exists)
@section('title', $edit ? 'Edit Mahasiswa' : 'Tambah Mahasiswa')
@section('heading', $edit ? 'Edit Mahasiswa' : 'Tambah Mahasiswa')

@section('content')
    <form method="POST" action="{{ $edit ? route('mahasiswa.update', $mahasiswa) : route('mahasiswa.store') }}">
        @csrf
        @if ($edit) @method('PUT') @endif

        @foreach (['nim' => 'NIM', 'nama' => 'Nama', 'prodi' => 'Program Studi'] as $field => $label)
            <label for="{{ $field }}">{{ $label }}</label>
            <input id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $mahasiswa->$field) }}">
            @error($field) <div class="error">{{ $message }}</div> @enderror
        @endforeach

        <p>
            <button class="btn" type="submit">Simpan</button>
            <a href="{{ route('mahasiswa.index') }}">Batal</a>
        </p>
    </form>
@endsection
