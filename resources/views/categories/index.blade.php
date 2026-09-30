@extends('layouts.app')

@section('title', 'Kategori Kegiatan')

@section('content')
    <h1>Kategori Kegiatan</h1>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Slug</th>
                <th>Jumlah Kegiatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->activities_count }}</td>
                    <td class="actions">
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 1rem;">
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Kembali ke Kegiatan</a>
    </div>
@endsection
