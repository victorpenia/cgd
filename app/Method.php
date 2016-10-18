<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $table = "methods";

    protected $fillable = [
        'name',
    ];
    
    protected $hidden = [
        'id',
    ];
    
    public function roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
}
