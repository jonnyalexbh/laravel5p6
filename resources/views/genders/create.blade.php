@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        @if ($errors->any())
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <a class="btn btn-link text-left" href="{{ route('genders.index') }}">Back</a>
        <div class="card">
          <div class="card-header">Genders</div>

          <div class="card-body">
            <form class="" action="{{ route('genders.store') }}" method="post">
              @csrf
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" placeholder="name">
                  </div>
                </div>
                <button type="submit" class="btn btn-warning">Submit</button>
                <a href="{{ route('genders.index') }}" class="btn btn-light" role="button">Back</a>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
