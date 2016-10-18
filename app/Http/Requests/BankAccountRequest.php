<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BankAccountRequest extends Request
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
                    'number_account' => 'required|max:30|unique:bank_accounts',
                ];
            }
            
            case 'PUT':
            {
                return [
                    'number_account' => 'required|max:30|unique:bank_accounts,number_account,'. $this->get('id'),
                ];
            }
        }
    }
}
