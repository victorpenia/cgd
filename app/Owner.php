<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = "owners";
    
    protected $fillable = [
        'first_name', 'last_name', 'ci', 'address', 'phone_house', 'phone_office' , 'cell_phone', 'email', 'number_people', 'status'
    ];
    
    protected $hidden = [
        
    ];
    
    public function departments(){
        return $this->hasMany('App\Department');
    }
    
    public function commonAreas(){
        return $this->belongsToMany('App\CommonAreas');
    }
    
    public function visitors(){
        return $this->hasMany('App\Visitor');
    }
    
    public function tenants(){
        return $this->hasMany('App\Tenant');
    }

    public function scopeSearch($query, $name){
        return $query->where('first_name', 'LIKE', '%'. $name. '%');
    }
    
    public function parkings(){
        return $this->hasMany('App\Parking');
    }
    
    public function closets(){
        return $this->hasMany('App\Closets');
    }
    
}
