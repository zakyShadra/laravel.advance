@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')
    <h1>Edit Kegiatan</h1>

    <p>Status saat ini: <span class="status-{{ $activity->status }}">{{ ucfirst($activity->status) }}</span>. Ubah status lewat tombol Publish/Selesaikan di halaman detail, bukan lewat form ini.</p>

    <form action="{{ route('activities.update', $activity) }}" method="POST">
        @csrf
        @method('PUT')
        @include('activities._form')

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
