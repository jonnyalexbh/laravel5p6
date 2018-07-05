<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
  /**
  * index
  *
  */
  public function index()
  {
    $genders = Gender::all();
    return view('genders.index', compact('genders'));
  }
  /**
  * create
  *
  */
  public function create()
  {
    return view('genders.create');
  }
  /**
  * store
  *
  */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|min:3'
    ]);

    $gender = Gender::create($request->all());
    return redirect()->route('genders.index')
    ->with('success','Product created successfully.');
  }
  /**
  * show
  *
  */
  public function show(Gender $gender)
  {
    return view('genders.show',compact('gender'));
  }
  /**
  * edit
  *
  */
  public function edit(Gender $gender)
  {
    return view('genders.edit',compact('gender'));
  }
  /**
  * update
  *
  */
  public function update(Request $request, Gender $gender)
  {
    $request->validate([
      'name' => 'required|min:3'
    ]);
    
    $gender->update($request->all());

    return redirect()->route('genders.index')
    ->with('success','Product updated successfully');
  }
  /**
  * destroy
  *
  */
  public function destroy(Gender $gender)
  {
    $gender->delete();
    return redirect()->route('genders.index')
    ->with('success','Product deleted successfully');
  }
}
