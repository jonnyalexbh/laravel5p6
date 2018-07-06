<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaritalStatusRequest extends FormRequest
{
  /**
  * Determine if the user is authorized to make this request.
  *
  * @return bool
  */
  public function authorize()
  {
    return true;
  }

  /**
  * Get the validation rules that apply to the request.
  *
  * @return array
  */
  public function rules()
  {
    return [
      'name' => 'required|min:2'
    ];
  }
  /**
  * messages
  *
  */
  public function messages()
  {
    return [
      'name.required' => 'please enter your name',
      'name.min' => 'the characters are very few'
    ];
  }
}
