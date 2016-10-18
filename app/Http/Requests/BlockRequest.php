<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BlockRequest extends Request
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
                    'name' => 'required|max:35|unique:blocks',
                ];
            }
            
            case 'PUT':
            {
                return [
                    'name' => 'required|max:35|unique:blocks,name,'. $this->get('id'),
                ];
            }
        }
    }
}
