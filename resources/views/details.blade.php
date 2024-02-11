@extends('layouts.main')

@section('content')

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 24rem;">
            <img src="{{ asset('images/istockphoto-1461129136-612x612.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body text-center">
                <h3 class="card-title fw-bold">{{ $book->title }}</h3>
                <p class="card-text">{{ $book->content }}</p>
                <form action="{{ route('reserve.book', $book->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-dark">Reserve</button>
                </form>
                <a href="/" class="btn btn-light">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection