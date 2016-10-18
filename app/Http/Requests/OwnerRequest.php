<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OwnerRequest extends Request
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
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'ci' => 'required|unique:owners',
                    'number_people' => 'required|integer',
                    'email' => 'required|unique:owners',
                ];
            }
            
            case 'PUT':
            {
                return [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'number_people' => 'required|integer',
                    'ci' => 'required|unique:owners,ci,'. $this->get('id'),
                    'email' => 'required|unique:owners,email,'. $this->get('id'),
                ];
            }
        }
    }
}
