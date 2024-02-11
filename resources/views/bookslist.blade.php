@extends('layouts.main')

@section('content')


<div class="container mt-5 mb-5">
  <div class="text-center">
    <h1 class="display-4 fw-bold text-dark">Books List</h1>
    <p class="lead">You can Update and delete books here.</p>
  </div>
</div>

<div class="container mt-5 mb-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">title</th>
        <th scope="col">Content</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($books as $book)
      <tr>
        <th scope="row">{{$book->id}}</th>
        <td>{{$book->title}}</td>
        <td>{{$book->content}}</td>
        <td class="d-flex gap-4">
          <form action="{{route('delete.book' , $book->id)}}" method="post">
            @method('DELETE') @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          <a href="{{ route('edit.book', $book->id) }}" class="btn btn-dark">Edit</a>
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
</div>

@endsection