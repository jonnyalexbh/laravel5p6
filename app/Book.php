<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  /**
  * relationship categories Many To Many
  *
  */
  public function categories()
  {
    return $this->belongsToMany('App\Category');
  }
}
