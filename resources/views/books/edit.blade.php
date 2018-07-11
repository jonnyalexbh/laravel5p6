@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <a class="btn btn-link text-left" href="{{ route('books.index') }}">Back</a>
        <div class="card">
          <div class="card-header">Book</div>

          <div class="card-body">
            <form class="" action="{{ route('books.update', $book->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="name">Title</label>
                    <input name="name" value="{{ $book->title }}" type="text" class="form-control" placeholder="name">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input name="description" value="{{ $book->description }}" type="text" class="form-control" placeholder="description">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="pages">pages</label>
                    <input name="pages" value="{{ $book->pages }}" type="text" class="form-control" placeholder="pages">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="date_of_publication">date_of_publication</label>
                    <input name="date_of_publication" value="{{ $book->date_of_publication }}" type="text" class="form-control" placeholder="yyyy-mm-dd">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <label for="categories">categories</label>
                    <select name="categories[]" multiple class="form-control">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (in_array($category->id, $book_categories))selected="selected" @endif>{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-warning">Submit</button>
                  <a href="{{ route('books.index') }}" class="btn btn-light" role="button">Back</a>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  @endsection
