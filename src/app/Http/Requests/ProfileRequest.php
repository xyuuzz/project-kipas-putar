<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "name" => "required|min:5|max:50",
            "username" => "required|alpha_num|min:5|max:25",
            "email" => "required|email|min:4|max:30",
            "password" => "required|min:6",
            "status" => "required",
            "hobi" => "min:3",
            "photo_profile" => "required"
        ];
        // |regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name Must greather than 5 font',
            "name.max" => "Name Must less than 50 font",
            "username.required" => "Username is required",
            "username.alpha_num" => "Type of username is alpha numeric",
            "username.min" => 'Username Must greather than 5 font',
            "username.max" => "Username Must less than 25 font",
            "email.min" => "Email Must greather than 4 font",
            "email.max" => "Email Must less than 30 font",
            "password.min" => "Password must greather than 6 font",
            "hobi.min" => "Password must greather than 3 font",
            "photo_profile.required" => "Photo Profile is Required"
        ];
    }
}
