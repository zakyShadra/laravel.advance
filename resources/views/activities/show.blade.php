@extends('layouts.app')

@section('title', $activity->title)

@section('content')
    <h1>{{ $activity->title }}</h1>

    <table>
        <tr><th>Kode</th><td>{{ $activity->code }}</td></tr>
        <tr><th>Kategori</th><td>{{ $activity->category->name }}</td></tr>
        <tr><th>Deskripsi</th><td>{{ $activity->description ?: '-' }}</td></tr>
        <tr><th>Lokasi</th><td>{{ $activity->location }}</td></tr>
        <tr><th>Mulai</th><td>{{ $activity->start_at->format('d M Y H:i') }}</td></tr>
        <tr><th>Selesai</th><td>{{ $activity->end_at->format('d M Y H:i') }}</td></tr>
        <tr><th>Kapasitas</th><td>{{ $activity->capacity }}</td></tr>
        <tr><th>Status</th><td class="status-{{ $activity->status }}">{{ ucfirst($activity->status) }}</td></tr>
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
@endsection
