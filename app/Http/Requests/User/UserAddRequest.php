<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'user_name'     => 'required|string',
            'user_email'     => 'required|email|unique:users,email',
            'user_mobile_no'     => 'required|integer|unique:users,mobile_no',
            'user_dob'=> 'required|date_format:d/m/Y',
            'user_type'=>'required',
            'password'=>'required',
            'con_password'=>'required|same:password'
        ];
    }

    public function messages()
    {
        return [
          'user_name.required'=>'Name is required',
          'user_email.required'=>'Email is required',
          'user_email.email'=>'Please enter valid email',
          'user_mobile_no.required'=>'Please enter mobile no',
          'user_dob.required'=>'Please enter date of birth',
          'user_dob.date_format'=>'DOB should be in DD/MM/YYYY format',
          'user_type.required'=>'Please select user type',
          'password.required'=>'Please enter password',
          'con_password.required'=>'Please enter confirm password',
          'con_password.same'=>'password and  confirm password are not matched',
            
        ];
    }
}
