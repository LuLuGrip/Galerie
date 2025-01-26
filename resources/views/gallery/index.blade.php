@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
    <h1 class="text-center">Gallery</h1>
    
    {{-- Zobrazení galerie --}}
    <div class="row">
        @forelse($photos as $photo)
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$photo->path) }}" alt="{{ $photo->filename }}" class="img-fluid">
                <p>{{ $photo->filename }}</p>
            </div>
        @empty
            <p class="text-center">Žádné fotky nebyly nalezeny.</p>
        @endforelse
    </div>

    {{-- Formulář pro nahrávání --}}
    <form action="{{ route('photos.upload') }}" method="POST" enctype="multipart/form-data" class="mt-5">
        @csrf
        <div class="mb-3">
            <label for="photo" class="form-label">Vyber fotku:</label>
            <input type="file" name="photo" id="photo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Nahrát</button>
    </form>
@endsection
