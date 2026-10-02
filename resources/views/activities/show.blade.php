@extends('layouts.app')

@section('title', $activity->title)

@section('content')
    <h1>{{ $activity->title }}</h1>

    @if ($activity->poster_path)
        <img src="{{ Storage::url($activity->poster_path) }}" alt="Poster {{ $activity->title }}" style="max-width: 300px; display: block; margin-bottom: 1rem;">
    @endif

    <table>
        <tr><th>Kode</th><td>{{ $activity->code }}</td></tr>
        <tr><th>Kategori</th><td>{{ $activity->category->name }}</td></tr>
        <tr><th>Deskripsi</th><td>{{ $activity->description ?: '-' }}</td></tr>
        <tr><th>Lokasi</th><td>{{ $activity->location }}</td></tr>
        <tr><th>Mulai</th><td>{{ $activity->start_at->format('d M Y H:i') }}</td></tr>
        <tr><th>Selesai</th><td>{{ $activity->end_at->format('d M Y H:i') }}</td></tr>
        <tr><th>Kapasitas</th><td>{{ $activity->capacity }}</td></tr>
        <tr><th>Status</th><td class="status-{{ $activity->status }}">{{ ucfirst($activity->status) }}</td></tr>
        <tr><th>Pendaftar</th><td>{{ $activity->registered_count }} / {{ $activity->capacity }}</td></tr>
    </table>

    <div style="margin-top: 1rem;">
        <a href="{{ route('activities.edit', $activity) }}" class="btn btn-edit">Edit</a>

        @if ($activity->status === 'draft')
            <form action="{{ route('activities.publish', $activity) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-primary">Publish</button>
            </form>
        @endif

        @if ($activity->status === 'published')
            <form action="{{ route('activities.complete', $activity) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-primary">Selesaikan</button>
            </form>
        @endif

        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if ($activity->status === 'published')
        <h2 style="margin-top: 2rem;">Daftar Kegiatan Ini</h2>
        <form action="{{ route('activities.registrations.store', $activity) }}" method="POST" style="max-width: 400px;">
            @csrf

            <div class="form-group">
                <label for="participant_name">Nama</label>
                <input type="text" name="participant_name" id="participant_name" value="{{ old('participant_name') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    @endif
@endsection
