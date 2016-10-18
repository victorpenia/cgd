<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = "parkings";
    
    protected $fillable = [
        'name'
    ];
    
    protected $hidden = [
        
    ];
    
    public function placeParking(){
        return $this->belongsTo('App\PlaceParking');
    }
    
    public function owner(){
        return $this->belongsTo('App\Owner');
    }
}
