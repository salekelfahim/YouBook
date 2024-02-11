@extends('layouts.main')

@section('content')

<div class="container mt-5 mb-5">
    <div class="text-center">
        <h1 class="display-4 fw-bold text-dark">My Reservations</h1>
        <p class="lead">You can return or see the books you reserved here.</p>
        <ul class="navbar-nav" style="width: 90px">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Deadlines
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">

                    @forelse($endDates as $bookTitle => $endDate)
                    <li><a class="dropdown-item" href="#">{{ $bookTitle }} - {{ $endDate }}</a></li>
                    @empty
                    <li><a class="dropdown-item" href="#">No reserved books</a></li>
                    @endforelse
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row">
        @foreach ($booksForCards as $book)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="images/istockphoto-1461129136-612x612.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <p class="card-text">{{$book->content}}</p>
                    <form action="{{ route('unreserve.book', $book->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-dark">Return</button>
                    </form>
                    <a href="{{ route('book.details', ['id' => $book->id]) }}#" class="btn btn-light">Details</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection