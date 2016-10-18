<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AnnualEstimation;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($annual_estimation_id){
        $annual_estimation = AnnualEstimation::find($annual_estimation_id);
        
        $payments = DB::table('payments')
                ->select('annual_estimation_payment.*', 'payments.id as payment_id', 'payments.name', 'payments.type')
                ->leftJoin('annual_estimation_payment', 'payments.id', '=', 'annual_estimation_payment.payment_id')
                ->where('annual_estimation_payment.annual_estimation_id', '=', $annual_estimation_id)
                ->get();
        
        $expenses = DB::table('expenses')
                ->select('annual_estimation_expense.*', 'expenses.id as expense_id', 'expenses.name', 'expenses.type')
                ->leftJoin('annual_estimation_expense', 'expenses.id', '=', 'annual_estimation_expense.expense_id')
                ->where('annual_estimation_expense.annual_estimation_id', '=', $annual_estimation_id)
                ->get();
        
        $annual_payments = DB::table('annual_estimation_payment')
                ->select('annual_estimation_id', DB::raw('SUM(annual) as total_payment'), DB::raw('SUM(january) as total_january'), DB::raw('SUM(february) as total_february'), DB::raw('SUM(march) as total_march'), DB::raw('SUM(april) as total_april'), DB::raw('SUM(may) as total_may'), DB::raw('SUM(june) as total_june'), DB::raw('SUM(july) as total_july'), DB::raw('SUM(august) as total_august'), DB::raw('SUM(september) as total_september'), DB::raw('SUM(octuber) as total_octuber'), DB::raw('SUM(november) as total_november'), DB::raw('SUM(december) as total_december'))
                ->where('annual_estimation_payment.annual_estimation_id', '=', $annual_estimation_id)
                ->groupBy('annual_estimation_id')
                ->get();
        
        $annual_expenses = DB::table('annual_estimation_expense')
                ->select('annual_estimation_id', DB::raw('SUM(annual) as total_expense'), DB::raw('SUM(january) as total_january'), DB::raw('SUM(february) as total_february'), DB::raw('SUM(march) as total_march'), DB::raw('SUM(april) as total_april'), DB::raw('SUM(may) as total_may'), DB::raw('SUM(june) as total_june'), DB::raw('SUM(july) as total_july'), DB::raw('SUM(august) as total_august'), DB::raw('SUM(september) as total_september'), DB::raw('SUM(octuber) as total_octuber'), DB::raw('SUM(november) as total_november'), DB::raw('SUM(december) as total_december'))
                ->where('annual_estimation_expense.annual_estimation_id', '=', $annual_estimation_id)
                ->groupBy('annual_estimation_id')
                ->get();
        
        $departments = DB::table('departments')
                ->get();
        
//        $activities = DB::table('activities')
//                ->select('activity_annual_estimation.*', 'activities.*', 'activities.id as activity_id')
//                ->leftJoin('activity_annual_estimation', 'activities.id', '=', 'activity_annual_estimation.activity_id')
//                ->where('activity_annual_estimation.annual_estimation_id', '=', $annual_estimation_id)
//                ->get();
//        $total_activities = DB::table('activities')
//                ->select('type', DB::raw('SUM(annual_estate) as total_estate'))
////                ->where('activity_annual_estimation.annual_estimation_id', '=', $annual_estimation_id)
//                ->groupBy('type')
//                ->get();
//        dd($total_activities);
        return view('activities.view')
                ->with('payments', $payments)
                ->with('expenses', $expenses)
                ->with('annual_payments', $annual_payments)
                ->with('annual_expenses', $annual_expenses)
                ->with('departments', $departments)
                ->with('annual_estimation', $annual_estimation);
//                ->with('total_activities', $total_activities);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    
//    public function createActivity($annual_estimation_id)
//    {        
//        return view('annualEstimations.view')->with('annual_estimation_id', $annual_estimation_id);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
}
