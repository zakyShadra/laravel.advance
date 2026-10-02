@extends('layouts.app')

@section('title', 'Sampah Kegiatan')

@section('content')
    <h1>Sampah Kegiatan</h1>

    <a href="{{ route('activities.index') }}" class="btn btn-secondary">Kembali ke Daftar Kegiatan</a>

    <table style="margin-top: 1rem;">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Dihapus Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activities as $activity)
                <tr>
                    <td>{{ $activity->code }}</td>
                    <td>{{ $activity->category->name }}</td>
                    <td>{{ $activity->title }}</td>
                    <td class="status-{{ $activity->status }}">{{ ucfirst($activity->status) }}</td>
                    <td>{{ $activity->deleted_at->format('d M Y H:i') }}</td>
                    <td class="actions">
                        <form action="{{ route('activities.restore', $activity) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-primary">Restore</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada kegiatan yang dihapus.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 1rem;">
        {{ $activities->links() }}
    </div>
@endsection
