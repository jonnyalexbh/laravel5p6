@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{ $message }}</p>
          </div>
        @endif
        <a class="btn btn-link text-left" href="{{ route('genders.create') }}"> Create New Gender</a>
        <div class="card">
          <div class="card-header">Genders</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>created_at</td>
                  <td>updated_at</td>
                  <td colspan="3">Actions</td>
                </tr>
              </thead>
              @foreach ($genders as $gender)
                <tbody>
                  <tr>
                    <td>{{ $gender->id }}</td>
                    <td>{{ $gender->name }}</td>
                    <td>{{ $gender->created_at }}</td>
                    <td>{{ $gender->updated_at }}</td>
                    <td><a class="btn btn-link" href="{{ route('genders.show', $gender->id) }}">See</a></td>
                    <td><a class="btn btn-link" href="{{ route('genders.edit', $gender->id) }}">Edit</a></td>
                    <td>
                      <form action="{{ route('genders.destroy', $gender->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link">Delete</button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
