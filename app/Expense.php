<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = "expenses";

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
