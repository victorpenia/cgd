<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnnualEstimationRequest extends Request
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
                    'annual_year' => 'required|unique:annual_estimations',
                ];
            }
            
            case 'PUT':
            {
                return [
                    'annual_year' => 'required|unique:annual_estimations,annual_year,'. $this->get('id'),
                ];
            }
        }
    }
}
