<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
  /**
  * relationship users One To Many
  *
  */
  public function users()
  {
    return $this->hasMany('App\User');
  }
}
