<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaceParking extends Model
{
    protected $table = "place_parkings";
    
    protected $fillable = [
        'name'
    ];
    
    protected $hidden = [
        
    ];
    
    public function parkings(){
        return $this->hasMany('App\Parking');
    }
}
