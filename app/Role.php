<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $fillable = [
        'name',
    ];
    
    protected $hidden = [
        'id',
    ];
    
    public function users(){
        return $this->hasMany('App\User');
    }
    
    public function methods(){
        return $this->belongsToMany('App\Method');
    }
}
