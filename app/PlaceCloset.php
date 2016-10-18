<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceCloset extends Model
{
    protected $table = "place_closets";
    
    protected $fillable = [
        'name'
    ];
    
    protected $hidden = [
        
    ];
    
    public function closets(){
        return $this->hasMany('App\Closet');
    }
}
