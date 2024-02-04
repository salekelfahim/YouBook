@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 24rem;">
        <img src="images/istockphoto-1461129136-612x612.jpg" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h3 class="card-title fw-bold">{{ $book->title }}</h3>
                <p class="card-text">{{ $book->content }}</p>
                <a href="#" class="btn btn-primary">Reserve</a>
            </div>
        </div>
    </div>
</div>

@endsection
