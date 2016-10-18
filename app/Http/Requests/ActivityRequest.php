<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ActivityRequest extends Request
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
                    'name' => 'required|unique:activities',
                    'annual_estate' => 'required|numeric',
                ];
            }
            
            case 'PUT':
            {
                return [
                    'name' => 'required|unique:activities,name,'. $this->get('id'),
                    'annual_estate' => 'required|numeric',
                ];
            }
        }
    }
}
