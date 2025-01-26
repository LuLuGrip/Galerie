@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
    <h1 class="text-center">Gallery</h1>

    {{-- Formulář pro nahrávání fotky (nahoře) --}}
    <div class="mt-5">
        <h3 class="text-center">Nahrát novou fotku</h3>
        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Název fotky:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Vyber fotku:</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Popis fotky:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Nahrát</button>
        </form>
    </div>

    {{-- Zobrazení galerie (dole) --}}
    <div class="row mt-5">
        @forelse($photos as $photo)
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$photo->path) }}" alt="{{ $photo->title }}" class="img-fluid">
                <p>{{ $photo->title }}</p>
            </div>
        @empty
            <p class="text-center">Žádné fotky nebyly nalezeny.</p>
        @endforelse
    </div>
@endsection
