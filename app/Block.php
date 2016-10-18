<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = "blocks";

    protected $fillable = [
        'name',
    ];
    
    protected $hidden = [
        'id',
    ];
    
    public function departments(){
        return $this->hasMany('App\Department');
    }
}
