<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BankRequest extends Request
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
                    'name' => 'required|max:30|unique:banks',
                ];
            }
            
            case 'PUT':
            {
                return [
                    'name' => 'required|max:30|unique:banks,name,'. $this->get('id'),
                ];
            }
        }
    }
}
