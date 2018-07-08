<?php

namespace App\Http\Controllers\Api;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
  /**
  * index
  *
  */
  public function index()
  {
    $books = Book::all();
    return response()->json(['data' => $books], 200);
  }
  /**
  * store
  *
  */
  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required',
      'description' => 'required|min:2|max:150',
      'pages' => 'required|numeric',
      'date_of_publication' => 'required|date'
    ], [
      'title.*' => 'The :attribute field is required.',
      'description.required' => 'The :attribute field is required.',
      'description.min' => 'the characters are min :min',
      'description.max' => 'the characters are max :max',
      'pages.required' => 'The :attribute field is required.',
      'pages.numeric' => 'The :attribute must be a number.',
      'date_of_publication.required' => 'please enter your date_of_publication',
      'date_of_publication.date' => 'The :attribute is not a valid date.',
    ]);

    $book = Book::create($request->all());
    return response()->json(['data' => $book], 201);
  }
  /**
  * show
  *
  */
  public function show($id)
  {
    $book = Book::findOrFail($id);
    return response()->json(['data' => $book], 200);
  }
  /**
  * update
  *
  */
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required',
      'description' => 'required|min:2|max:150',
      'pages' => 'required|numeric',
      'date_of_publication' => 'required|date'
    ], [
      'title.*' => 'The :attribute field is required.',
      'description.required' => 'The :attribute field is required.',
      'description.min' => 'the characters are min :min',
      'description.max' => 'the characters are max :max',
      'pages.required' => 'The :attribute field is required.',
      'pages.numeric' => 'The :attribute must be a number.',
      'date_of_publication.required' => 'please enter your date_of_publication',
      'date_of_publication.date' => 'The :attribute is not a valid date.',
    ]);

    $book = Book::findOrFail($id);

    if ($request->has('title')) {
      $book->title = $request->title;
    }
    if ($request->has('description')) {
      $book->description = $request->description;
    }
    if ($request->has('pages')) {
      $book->pages = $request->pages;
    }
    if ($request->has('date_of_publication')) {
      $book->date_of_publication = $request->date_of_publication;
    }

    if (!$book->isDirty()) {
      return response()->json(['error' => 'You need to specify a different value to update', 'code' => 422], 422);
    }

    $book->save();
    return response()->json(['data' => $book], 200);
  }
  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    $book = Book::find($id);
    $book->delete();
    return response()->json(['data' => $book], 200);
  }
}
