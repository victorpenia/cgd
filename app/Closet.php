<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Closet extends Model
{
    protected $table = "closets";
    
    protected $fillable = [
        'name',
    ];
    
    protected $hidden = [
        
    ];
    
    public function placeCloset(){
        return $this->belongsTo('App\PlaceCloset');
    }
    
    public function owner(){
        return $this->belongsTo('App\Owner');
    }
}
