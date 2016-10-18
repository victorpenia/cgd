<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnualEstimation extends Model
{
    protected $table = "annual_estimations";

    protected $fillable = [
        'name', 'annual_year', 'status', 'init_date', 'end_date'
    ];
    
    protected $hidden = [
        'id',
    ];
    
    public function expenses(){
        return $this->belongsToMany('App\Expense')->withTimestamps();
    }
    
    public function payments(){
        return $this->belongsToMany('App\Payment')->withTimestamps();
    }
}
