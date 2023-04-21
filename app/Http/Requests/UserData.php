<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserData extends FormRequest
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
            'email'=>'required|email',
            'password'=>'string|regex:/\A([a-zA-Z0-9]{8,})+\z/u',
            'name'=>'required|string|MAX:10',
            'password_confirmation'=>'string|regex:/\A([a-zA-Z0-9]{8,})+\z/u',

            
        ];
    }
}
