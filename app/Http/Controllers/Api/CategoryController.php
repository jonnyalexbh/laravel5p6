<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
  /**
  * index
  *
  */
  public function index()
  {
    $categories = Category::with('books')->get();
    return response()->json(['data' => $categories], 200);
  }
  /**
  * store
  *
  */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required'
    ]);

    $category = new Category;
    $category->name = $request->name;
    $category->save();
    return response()->json(['data' => $category], 201);
  }
  /**
  * show
  *
  */
  public function show($id)
  {
    $category = Category::find($id);
    return response()->json(['data' => $category], 200);
  }
  /**
  * update
  *
  */
  public function update(Request $request, $id)
  {
    $category = Category::findOrFail($id);
    $category->name = $request->name;
    $category->save();
    return response()->json(['data' => $category], 200);
  }
  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    $category = Category::destroy($id);
    return response()->json(['data' => $category], 200);
  }
}
