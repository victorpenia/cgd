<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Closet;

class ClosetRepository{
    
    public function getClosetsforPlaceCloset($place_closet_id){
        Return Closet::where('place_closet_id', $place_closet_id)->orderBy('name', 'ASC')->paginate(10);
    }
    
}

