<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
  protected $table = 'marital_statuses';
  protected $fillable = ['name'];
  public $timestamps = true;
  
  const CREATED_AT = 'date_created';
  const UPDATED_AT = 'date_modified';
  /**
  * relationship users One To Many
  *
  */
  public function users()
  {
    return $this->hasMany('App\User')->where('is_active', 1)->orderBy('name');
  }
}
