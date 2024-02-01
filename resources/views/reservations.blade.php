@extends('layouts.main')

@section('content')

<div class="container mt-5 mb-5">
    <div class="text-center">
        <h1 class="display-4 fw-bold text-dark">My Reservations</h1>
        <p class="lead">You can return or see the books you reserved here.</p>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
        @foreach ($books as $book)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="images/istockphoto-1461129136-612x612.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">{{$book->content}}</p>
                        <a href="#" class="btn btn-dark">Return</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection