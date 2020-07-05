<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $edit_id=$request->edit_id;
       
        return [
            'user_name'     => 'required|string',
            'user_email'     => 'required|email|unique:users,email,' . $edit_id,
            'user_mobile_no'     => 'required|integer|unique:users,mobile_no,' . $edit_id,
            'user_dob'=> 'required|date_format:d/m/Y',
            'user_type'=>'required',
            
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
          
            
        ];
    }
}
