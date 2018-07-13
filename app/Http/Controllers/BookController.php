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
    $book = Book::findOrFail($id);
    return view('books.show',compact('book'));
  }
  /**
  * edit
  *
  */
  public function edit($id)
  {
    $book = Book::with('categories')->whereId($id)->first();
    $book_categories= $book->categories->pluck('id')->toArray();
    $categories = Category::all();
    return view('books.edit', compact('book', 'book_categories', 'categories'));
  }
  /**
  * update
  *
  */
  public function update(Request $request, $id)
  {
    $book = Book::find($id);                          // $book->categories()->detach();

    $book->update($request->all());
    $book->categories()->sync($request->categories);  // $book->categories()->attach($request->categories);

    return redirect()->route('books.index')
    ->with('success','Book updated successfully');
  }
  /**
  * destroy
  *
  */
  public function destroy(Book $book)
  {
    $book->delete();
    return redirect()->route('books.index')
    ->with('success','Book deleted successfully');
  }
}
