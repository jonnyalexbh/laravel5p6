<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
  /**
  * index
  *
  */
  public function index()
  {
    $books = Book::with('categories')->get();
    return view('books.index', compact('books'));
  }
  /**
  * create
  *
  */
  public function create()
  {
    $categories = Category::all();
    return view('books.create', compact('categories'));
  }
  /**
  * store
  *
  */
  public function store(Request $request)
  {
    $book = Book::create($request->all());
    $book->categories()->attach($request->categories);

    return redirect()->route('books.index')
    ->with('success','Book created successfully.');
  }
  /**
  * show
  *
  */
  public function show($id)
  {
    //
  }
  /**
  * edit
  *
  */
  public function edit($id)
  {
    //
  }
  /**
  * update
  *
  */
  public function update(Request $request, $id)
  {
    //
  }
  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    //
  }
}
