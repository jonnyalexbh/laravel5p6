<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
  * relationship books Many To Many
  *
  */
  public function books()
  {
    return $this->belongsToMany('App\Book');
  }
}
