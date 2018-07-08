<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = ['title', 'description', 'pages', 'date_of_publication'];
  /**
  * relationship categories Many To Many
  *
  */
  public function categories()
  {
    return $this->belongsToMany('App\Category');
  }
}
