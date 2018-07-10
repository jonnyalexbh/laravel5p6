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
        <a class="btn btn-link text-left" href="{{ route('books.create') }}">Create New Book</a>
        <div class="card">
          <div class="card-header">Books</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <td>ID</td>
                  <td>Title</td>
                  <td>description</td>
                  <td>pages</td>
                  <td>date_of_publication</td>
                  <td colspan="3">Actions</td>
                </tr>
              </thead>
              @foreach ($books as $book)
                <tbody>
                  <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->date_of_publication }}</td>
                    <td><a class="btn btn-link" href="{{ route('books.show', $book->id) }}">See</a></td>
                    <td><a class="btn btn-link" href="{{ route('books.edit', $book->id) }}">Edit</a></td>
                    <td>
                      <form action="{{ route('books.destroy', $book->id) }}" method="POST">
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
