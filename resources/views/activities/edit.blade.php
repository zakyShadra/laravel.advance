@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')
    <h1>Edit Kegiatan</h1>

    <form action="{{ route('activities.update', $activity) }}" method="POST">
        @csrf
        @method('PUT')
        @include('activities._form')

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
