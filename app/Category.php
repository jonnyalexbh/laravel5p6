<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = 'categories';
  public $timestamps = true;
  protected $hidden = ['pivot'];
  /**
  * relationship books Many To Many
  *
  */
  public function books()
  {
    return $this->belongsToMany('App\Book', 'book_category', 'category_id', 'book_id');
  }
}
