@extends('layouts.app')

@section('title', 'Daftar Kegiatan')

@section('content')
    <h1>Daftar Kegiatan</h1>

    <a href="{{ route('activities.create') }}" class="btn btn-primary">+ Tambah Kegiatan</a>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Lokasi</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Kapasitas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activities as $activity)
                <tr>
                    <td>{{ $activity->code }}</td>
                    <td>{{ $activity->category->name }}</td>
                    <td>{{ $activity->title }}</td>
                    <td>{{ $activity->location }}</td>
                    <td>{{ $activity->start_at->format('d M Y H:i') }}</td>
                    <td>{{ $activity->end_at->format('d M Y H:i') }}</td>
                    <td>{{ $activity->capacity }}</td>
                    <td class="status-{{ $activity->status }}">{{ ucfirst($activity->status) }}</td>
                    <td class="actions">
                        <a href="{{ route('activities.show', $activity) }}" class="btn btn-secondary">Lihat</a>
                        <a href="{{ route('activities.edit', $activity) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('activities.destroy', $activity) }}" method="POST" onsubmit="return confirm('Hapus kegiatan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada kegiatan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 1rem;">
        {{ $activities->links() }}
    </div>
@endsection
