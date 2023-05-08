<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'confim_password' => 'required|same:password',
            'role' => 'required|integer',
            'dial_code' => 'required|min:1',
            'mobile' => 'required|min:10',
            'profile_pic' => 'required|image|mimes:jpg,png,jpeg|max:2048|'
        ];
    }
}