@extends('layouts.main')

@section('content')


<div class="container mt-5 mb-5">
  <div class="text-center">
    <h1 class="display-4 fw-bold text-dark">Users List</h1>
    <p class="lead">You can Update Usres role here.</p>
  </div>
</div>

<div class="container mt-5 mb-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->role_id}}</td>
        <td class="d-flex gap-4">
          <form action="{{ route('deleteUser', ['userId' => $user->id]) }}" method="post">
            @method('DELETE') @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#reserveModal{{$user->id}}">
            updateRole
          </button>

          <div class="modal fade" id="reserveModal{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reserveModal{{$user->id}}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="reserveModall{{$user->id}}">Update Role</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('updateRole', $user->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="role_id" class="form-label">Select Role</label>
                      <select class="form-select" id="role_id" name="role_id" required>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-dark">Update Role</button>
                    </div>
                  </form>
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
</div>

@endsection