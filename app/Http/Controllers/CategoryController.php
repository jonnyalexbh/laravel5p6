<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
  * index
  *
  */
  public function index()
  {
    $categories = Category::all();
    return view('categories.index', compact('categories'));
  }
  /**
  * create
  *
  */
  public function create()
  {
    return view('categories.create');
  }
  /**
  * store
  *
  */
  public function store(Request $request)
  {
    $category = Category::create($request->all());

    return redirect()->route('categories.index')
    ->with('success','Category created successfully.');
  }
  /**
  * show
  *
  */
  public function show($id)
  {
    $category = Category::findOrFail($id);
    return view('categories.show', compact('category'));
  }
  /**
  * edit
  *
  */
  public function edit(Category $category)
  {
    return view('categories.edit', compact('category'));
  }
  /**
  * update
  *
  */
  public function update(Request $request, $id)
  {
    $category = Category::find($id);
    $category->update($request->all());

    return redirect()->route('categories.index')
    ->with('success','Category updated successfully');
  }
  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    $category = Category::destroy($id);

    return redirect()->route('categories.index')
    ->with('success','Category deleted successfully');
  }
}
