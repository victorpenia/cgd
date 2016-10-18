<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = "bank_accounts";
    
    protected $fillable = [
        'number_account', 'type_money'
    ];
    
    protected $hidden = [
        
    ];
    
    public function bank(){
        return $this->belongsTo('App\Bank');
    }
}
