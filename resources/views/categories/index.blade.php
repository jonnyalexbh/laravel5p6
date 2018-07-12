@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <a class="btn btn-link text-left" href="{{ route('categories.create') }}"> Create New Category</a>
        <div class="card">
          <div class="card-header">Categories</div>
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
              @foreach ($categories as $category)
                <tbody>
                  <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td><a class="btn btn-link" href="{{ route('categories.show', $category->id) }}">See</a></td>
                    <td><a class="btn btn-link" href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
                    <td><a class="btn btn-link" href="{{ route('categories.destroy', $category->id) }}">Delete</a></td>
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
