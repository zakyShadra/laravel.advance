@extends('layouts.app')

@section('title', $activity->title)

@section('content')
    <h1>{{ $activity->title }}</h1>

    <table>
        <tr><th>Deskripsi</th><td>{{ $activity->description ?: '-' }}</td></tr>
        <tr><th>Lokasi</th><td>{{ $activity->location }}</td></tr>
        <tr><th>Mulai</th><td>{{ $activity->start_at->format('d M Y H:i') }}</td></tr>
        <tr><th>Selesai</th><td>{{ $activity->end_at->format('d M Y H:i') }}</td></tr>
        <tr><th>Kapasitas</th><td>{{ $activity->capacity }}</td></tr>
        <tr><th>Status</th><td class="status-{{ $activity->status }}">{{ ucfirst($activity->status) }}</td></tr>
    </table>

    <div style="margin-top: 1rem;">
        <a href="{{ route('activities.edit', $activity) }}" class="btn btn-edit">Edit</a>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
