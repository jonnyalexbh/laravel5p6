<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
  /**
  * Transform the resource into an array.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return array
  */
  public function toArray($request)
  {
    return [
      'id' => (string) $this->id,
      'name' => $this->name,
      'dt_birth' => $this->dt_birth,
      'gender_id' => $this->gender_id,
      'marital_status_id' => $this->marital_status_id,
      'email' => $this->email,
      'phone' => (int) $this->phone,
      'mobile' => $this->mobile,
      'is_active' => $this->is_active,
      'created_at' => (string) $this->created_at,
      'updated_at' => $this->updated_at,
      'last_login_at' => $this->last_login_at,
      'last_login_ip' => $this->last_login_ip,
      'password_changed_at' => $this->password_changed_at,
      'admin' => $this->admin
    ];
  }
}
