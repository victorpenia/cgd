<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommonAreas extends Model
{
    protected $table = "common_areas";

    protected $fillable = [
        'name', 'code', 'price_one', 'price_two'
    ];
    
    protected $hidden = [
        'id', 'user_id'
    ];
    
    public function onwers(){
        return $this->belongsToMany('App\Onwer');
    }
}
