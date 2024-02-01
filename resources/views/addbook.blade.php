@extends('layouts.main')

@section('content')

<div class="container mt-5 mb-5">
    <div class="text-center">
        <h1 class="display-4 fw-bold text-dark">Add Your Book</h1>
        <p class="lead">You can add the title and the content of your book here.</p>
    </div>
</div>
<div class="container mt-5 mb-5">
    <form action="{{route('addBook')}}" method="post" class="mx-auto" style="width: 70%;">
        @csrf
        <div class="mb-3">
            <label for="form4Example1" class="form-label">Title</label>
            <input type="text" id="form4Example1" name="title" class="form-control" />
        </div>

        <div class="mb-3">
            <label for="form4Example3" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="form4Example3" rows="8"></textarea>
        </div>


        <button name="submit" type="submit" class="btn btn-dark float-end">Add Book</button>
    </form>
</div>

@endsection