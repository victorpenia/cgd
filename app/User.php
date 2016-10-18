<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";

    protected $fillable = [
        'first_name', 'last_name', 'address', 'phone', 'cell_phone', 'email', 'status', 'role_id'
    ];

    protected $hidden = [
        'password', 'role_id',
    ];
    
    public function role(){
        return $this->belongsTo('App\Role');
    }
    
    public function generalSetting(){
        return $this->belongsTo('App\GeneralSetting');
    }
    
    public function scopeSearch($query, $name){
        return $query->where('first_name', 'LIKE', '%'. $name. '%');
    }
}
