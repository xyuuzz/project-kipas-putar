<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /*
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /*
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|string|min:5|max:50",
            "username" => "required|alpha_num|min:5|max:25",
            "email" => "required|email|min:4|max:30",
            "password" => "required|string|confirmed|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|",
            "status" => "required|string"
        ];
    }

    /*
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name Must greather than 5 font',
            "name.max" => "Name Must less than 50 font",
            "username.required" => "Username is required",
            "username.alpha_num" => "Type of username os alpha numeric",
            "username.min" => 'Username Must greather than 5 font',
            "username.max" => "Username Must less than 25 font",
            "email.min" => "Email Must greather than 4 font",
            "email.max" => "Email Must less than 30 font",
            "password.min" => "Password must greather than 6 font",
            "password.regex" => "Use a Unique Password!"
        ];
    }
}
