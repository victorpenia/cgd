<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Parking;

class ParkingRepository{
    
    public function getParkingsforPlaceParking($place_parking_id){
        Return Parking::where('place_parking_id', $place_parking_id)->orderBy('name', 'ASC')->paginate(10);
    }
    
}

