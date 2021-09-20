<?php

namespace App\Http\Requests;

use App\Traits\GetRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    use GetRequest;

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
        $valid_postcode = $this->valid_postcode($this->postcode);

        if($valid_postcode) {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'postcode' => 'required',
                'password' => 'required'
            ];
        }

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'valid_postcode' => 'required',
            'password' => 'required'
        ];
    }

    public function valid_postcode($postcode)
    {

      $validatePostcode = $this->getRequest('https://api.postcodes.io/postcodes/'.$postcode);

      if($validatePostcode->status == 200) {
          return true;
      }

      return false;

    }
}
