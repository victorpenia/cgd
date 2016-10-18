<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GeneralSettingRequest extends Request
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
        return [
            'name' => 'required|unique:general_setting_building,name,' . $this->get('id'),
//            'nit' => 'required|unique:general_setting_building,nit,' . $this->get('id'),
            'city' => 'required',
            'address' => 'required',
            'email' => 'email',
//            'number_block' => 'required|integer',
//            'number_department' => 'required|integer',
//            'number_parking' => 'required|integer',
//            'number_closet' => 'required|integer',
            'increment_factor' => 'required|numeric',
            'type_change' => 'required|numeric',
            'discount_payment_number' => 'required|numeric',
            'breach_number' => 'required|numeric',
            'limit_date_payment' => 'required|integer',
            'init_date' => 'required',
            'end_date' => 'required',
            'logo' => 'image',
        ];
    }

}
