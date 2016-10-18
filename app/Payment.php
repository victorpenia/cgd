<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";

    protected $fillable = [
        'name', 'status',
    ];
    
    protected $hidden = [
        'id',
    ];
    
    public function annualEstimations(){
        return $this->belongsToMany('App\AnnualEstimation')->withTimestamps();
    }
}
