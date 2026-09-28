@extends('layouts.app')

@section('title', 'Tambah Kegiatan')

@section('content')
    <h1>Tambah Kegiatan</h1>

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf
        @include('activities._form')

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
