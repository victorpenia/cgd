<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('superadmin');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }
    
    public function show($id){
//        dd('llega'. $id);
        $department = DB::table('departments')
                ->where('departments.id', '=', $id)
                ->leftJoin('owners', 'departments.owner_id', '=', 'owners.id')
                ->first();
//                ->get();
        return response()->json(
                $department
        );
    }
}
