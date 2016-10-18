<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\BankAccount;

class BankAccountRepository{
    
    public function getbankAccountforBank($bank_id){
        Return BankAccount::where('bank_id', $bank_id)->orderBy('number_account', 'ASC')->paginate(10);
    }
    
}

