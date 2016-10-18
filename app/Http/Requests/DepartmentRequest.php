<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentRequest extends Request
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
                    'name' => 'required|max:50|unique:departments',
                    'code' => 'required|max:15|unique:departments',
                    'area_m2' => 'required|numeric'            
                ];
            }
            
            case 'PUT':
            {
                return [
                    'name' => 'required|max:50|unique:departments,name,'. $this->get('id'),
                    'code' => 'required|max:15|unique:departments,code,'. $this->get('id'),
                    'area_m2' => 'required|numeric'            
                ];
            }
        }
        
    }
}
