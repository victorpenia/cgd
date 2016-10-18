<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'first_name' => 'required|max:35',
                    'last_name' => 'required|max:35',
                    'email' => 'required|max:50|unique:users',
                    'password' => 'required|max:50|same:confirm_password',
                    'confirm_password' => 'required|max:50|same:password'
                ];
            }
            
            case 'PUT':
            {
                return [
                    'first_name' => 'required|max:35',
                    'last_name' => 'required|max:35',
                    'email' => 'required|max:50|unique:users,email,'. $this->get('id'),
                ];
            }
        }
        
    }
}
