<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommonAreaRequest extends Request
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
                    'name' => 'required|max:30|unique:common_areas',
                    'code' => 'required|max:15|unique:common_areas',
                    'price_one' => 'required|numeric',
                    'price_two' => 'required|numeric',
                ];
            }
            
            case 'PUT':
            {
                return [
                    'name' => 'required|max:30|unique:common_areas,name,'. $this->get('id'),
                    'code' => 'required|max:15|unique:common_areas,code,'. $this->get('id'),
                    'price_one' => 'required|numeric',
                    'price_two' => 'required|numeric',
                ];
            }
        }
    }
}
