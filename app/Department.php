<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";

    protected $fillable = [
        'name', 'code', 'floor', 'category', 'area_m2', 'status', 'own', 'description', 'block_id', 
    ];

    protected $hidden = [
        
    ];
    
    public function owner(){
        return $this->belongsTo('App\Owner');
    }
    
    public function block(){
        return $this->belongsTo('App\Block');
    }
    
    public function scopeSearch($query, $name){
        return $query->where('code', 'LIKE', '%'. $name. '%');
    }
    
    
}
