<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VisitorRequest extends Request
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
                    'name' => 'required',
                    'ci' => 'required|unique:visitors',
                ];
            }
            
            case 'PUT':
            {
                return [
                    'name' => 'required',
                    'ci' => 'required|unique:visitors,ci,'. $this->get('id'),
                ];
            }
        }
    }
}
