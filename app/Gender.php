<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
  protected $table = 'genders';
  protected $fillable = ['name'];
  public $timestamps = true;
  /**
  * cast
  *
  */
  protected $casts = [
    'id' => 'string',
  ];
  /**
  * relationship users One To Many
  *
  */
  public function users()
  {
    return $this->hasMany('App\User', 'gender_id', 'id');
  }
  /**
  * accessors
  *
  */
  public function getNameAttribute($value)
  {
    return ucwords(strtolower($value));
  }
  /**
  * Mutator
  *
  */
  public function setNameAttribute($value)
  {
    $this->attributes['name'] = strtolower($value);
  }
}
