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
    'name', 'email', 'password', 'phone', 'gender_id', 'last_login_at', 'last_login_ip', 'password_changed_at'
  ];
  /**
  * appending values to JSON
  *
  */
  protected $appends = ['admin'];
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

  public function marital_status()
  {
    return $this->belongsTo('App\MaritalStatus');
  }
  /**
  * accessors
  *
  */
  public function getAdminAttribute() {
    if ($this->id == 1 && $this->is_active == 1) {
      return $this->id.' is admin';
    }
    if ($this->id == 2 && $this->is_active == 1) {
      return $this->id.' is admin';
    }
    return 'undefined';
  }

  public function getNameAttribute($value)
  {
    return ucwords(strtolower($value));
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
