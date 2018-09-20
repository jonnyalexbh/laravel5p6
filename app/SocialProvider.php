<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
  protected $fillable = ['provider_id', 'provider'];
  /**
  * relationship
  *
  */
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
