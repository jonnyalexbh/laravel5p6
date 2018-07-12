@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <a class="btn btn-link text-left" href="{{ route('categories.index') }}">Back</a>
        <div class="card">
          <div class="card-header">Category</div>

          <div class="card-body">
            <form class="" action="{{ route('categories.update', $category->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" value="{{ $category->name }}"type="text" class="form-control" placeholder="name">
                  </div>
                </div>
                <button type="submit" class="btn btn-warning">Submit</button>
                <a href="{{ route('categories.index') }}" class="btn btn-light" role="button">Back</a>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
