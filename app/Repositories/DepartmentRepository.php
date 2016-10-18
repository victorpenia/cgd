<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentRepository{
    
    public function getDepartmentsforBlock(){
//        Return Tenant::where('owner_id', $id)->orderBy('first_name', 'ASC')->paginate(10);
        
        return DB::table('departments')
                ->select('departments.*', 'blocks.id as block_id', 'blocks.name as block_name')
                ->join('blocks', 'departments.block_id', '=', 'blocks.id')
                ->orderBy('floor', 'ASC')->orderBy('code', 'ASC')->paginate(10);
    }
    
}

