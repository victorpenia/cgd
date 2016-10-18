<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "banks";
    
    protected $fillable = [
        'name'
    ];
    
    protected $hidden = [
        
    ];
    
    public function bankAccounts(){
        return $this->hasMany('App\BankAccount');
    }
}
