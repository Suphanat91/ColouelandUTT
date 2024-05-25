@extends('layouts.coffeetable')

@section('title', 'QR_code')

@section('content')
<style>
    .image-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .image-card {
        margin: 10px;
        max-width: 300px;
        text-align: center;
    }

    .image-card img {
        max-width: 100%;
        height: auto;
    }
</style>

<div class="container">
    <h1 class="text-center mb-4">QR CODE</h1>
    <div class="image-container">
        @forelse ($images as $image)
        <div class="card image-card">
            <img src="{{ asset($image->path) }}" class="card-img-top" alt="Image">
            <div class="card-body">
                <a href="/imageQR/{{$image->idimage_qr}}/edit" class="btn btn-primary btn-block">Edit</a>
            </div>
        </div>
        @empty
        <div class="col">
            <div class="alert alert-info" role="alert">
                No images found. <a href="/imageQR/create" class="alert-link">Add a new image</a>.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
