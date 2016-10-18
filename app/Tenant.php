<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $table = "tenants";
    
    protected $fillable = [
        'first_name', 'last_name', 'ci', 'address', 'phone_house', 'phone_office', 'cell_phone', 'email', 'number_people', 'status'
    ];
    
    protected $hidden = [
        'owner_id'
    ];
    
    public function owner(){
        return $this->belongsTo('App\Owner');
    }
}
