<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
  protected $table = 'genders';
  /**
  * users One To Many
  *
  */
  public function users()
  {
    return $this->hasMany('App\User', 'gender_id', 'id');
  }
}
