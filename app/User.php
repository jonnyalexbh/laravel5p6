<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];
  /**
  * relationship gender One To Many (Inverse)
  *
  */
  public function gender()
  {
    return $this->belongsTo('App\Gender', 'gender_id', 'id');
  }
  /**
  * scopeActive
  *
  */
  public function scopeActive($query)
  {
    return $query->where('is_active', 1);
  }
  /**
  * scopeOfGender
  *
  */
  public function scopeOfGender($query, $gender)
  {
    return $query->where('gender_id', $gender);
  }
}
