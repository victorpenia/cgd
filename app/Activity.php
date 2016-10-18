<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activities";

    protected $fillable = [
        'name', 'annual_estate', 'type', 'status', 'concept',
    ];
    
    protected $hidden = [
        'id',
    ];
    
    public function annualEstimations(){
        return $this->belongsToMany('App\AnnualEstimation')->withTimestamps();
    }
}
