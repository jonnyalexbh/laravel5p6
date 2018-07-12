@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <a class="btn btn-link text-left" href="{{ route('categories.index') }}">Back</a>
        <div class="card">
          <div class="card-header">Category</div>

          <div class="card-body">
            <div class="row">

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>ID:</strong>
                  {{ $category->id }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Name:</strong>
                  {{ $category->name }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>created_at:</strong>
                  {{ $category->created_at }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>updated_at:</strong>
                  {{ $category->updated_at }}
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
