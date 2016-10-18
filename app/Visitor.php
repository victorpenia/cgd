<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = "visitors";
    
    protected $fillable = [
        'name', 'ci', 'relationship', 'status'
    ];
    
    protected $hidden = [
        'owner_id'
    ];
    
    public function owner(){
        return $this->belongsTo('App\Owner');
    }
}
