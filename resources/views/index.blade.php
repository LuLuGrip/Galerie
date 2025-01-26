@extends('layouts.app')

@section('content')
    <h1 class="text-center">Gallery</h1>
    <div class="row">
        @forelse($photos as $photo)
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$photo->path) }}" alt="{{ $photo->title }}" class="img-fluid">
                <p>{{ $photo->title }}</p>
            </div>
        @empty
            <p>No photos available.</p>
        @endforelse
    </div>
@endsection
