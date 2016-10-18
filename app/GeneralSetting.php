<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = "general_setting_building";

    protected $fillable = [
        'name', 'nit', 'logo', 'city', 'address', 'phone', 'cell_phone', 'web', 'email', 'increment_factor',
        'type_change', 'quota_factor', 'type_money', 'theme', 'separate_decimal', 'discount_payment', 'discount_payment_number', 'discount_payment_select', 
        'breach', 'breach_number', 'breach_select', 'limit_date_payment','init_date', 'end_date'
    ];

    protected $hidden = [
        'id'
    ];
    
    public function users(){
        return $this->hasMany('App\User');
    }
}
