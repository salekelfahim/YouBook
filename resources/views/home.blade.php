@extends('layouts.main')

@section('content')

<div class="container mt-5 mb-5">
    <div class="text-center">
        <h1 class="display-4 fw-bold text-dark">Our Books</h1>
        <p class="lead">Choose your book and reserve it now.</p>
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
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#reserveModal{{$book->id}}">
                        Reserve
                    </button>

                    <a href="{{ route('book.details', ['id' => $book->id]) }}" class="btn btn-light">Details</a>

                    <div class="modal fade" id="reserveModal{{$book->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reserveModal{{$book->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reserveModall{{$book->id}}">Reserve Book</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('reserve.book', $book->id) }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="end_date{{$book->id}}" class="form-label">Select End Date</label>
                                            <input type="date" id="end_date{{$book->id}}" name="end_date" class="form-control" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark">Reserve</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection