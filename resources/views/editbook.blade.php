

@extends('layouts.main')

@section('content')
<div class="container mt-5 mb-5">
    <form action="{{ route('update.book', $book->id) }}" method="post" class="mx-auto" style="width: 70%;">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}" />
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" rows="8">{{ $book->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-dark float-end">Update Book</button>
    </form>
</div>
@endsection
