@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <a class="btn btn-link text-left" href="{{ route('books.index') }}">Back</a>
        <div class="card">
          <div class="card-header">Book</div>

          <div class="card-body">
            <div class="row">

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>ID:</strong>
                  {{ $book->id }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Name:</strong>
                  {{ $book->title }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>description:</strong>
                  {{ $book->description }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>pages:</strong>
                  {{ $book->pages }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>date_of_publication:</strong>
                  {{ $book->date_of_publication }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>language:</strong>
                  {{ $book->language }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>created_at:</strong>
                  {{ $book->created_at }}
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>updated_at:</strong>
                  {{ $book->updated_at }}
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
