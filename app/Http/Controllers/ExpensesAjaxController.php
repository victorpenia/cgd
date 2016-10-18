<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\ExpenceRequest;
use App\Expense;
use App\AnnualEstimation;

class ExpensesAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing($annual_estimation_id){
        $concept = DB::table('expenses')
                ->select('annual_estimation_expense.*', 'expenses.name', 'expenses.type', 'expenses.id as expense_id')
                ->leftJoin('annual_estimation_expense', 'expenses.id', '=', 'annual_estimation_expense.expense_id' )
                ->where('annual_estimation_expense.annual_estimation_id', '=', $annual_estimation_id)
                ->get();
        return response()->json(
            $concept            
        );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($annual_estimation_id)
    {
        $annual_estimation = AnnualEstimation::find($annual_estimation_id);
        return view('expensesAjax.index')->with('annual_estimation', $annual_estimation)->with('annual_estimation_id', $annual_estimation_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($annual_estimation_id)
    {
        return response()->json(
            $annual_estimation_id            
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenceRequest $request)
    {
//        dd($request->all());
        $expense = new Expense();
        $expense->name = $request->name;
        $expense->type = $request->type;
        $expense->status = 'Activo';
        $expense->user_id = \Auth::user()->id;
        $expense->save();
        
        $average = $request->annual_estate / 12;
        $annual_estimation = AnnualEstimation::find($request->annual_estimation_id);
        $annual_estimation->expenses()->save($expense, ['annual' => $request->annual_estate, 'january' => $average, 'february' => $average, 'march' => $average, 'april' => $average, 'may' => $average, 'june' => $average, 'july' => $average, 'august' => $average, 'september' => $average, 'octuber' => $average, 'november' => $average, 'december' => $average]);
        
        return response()->json([
            'mensaje' => 'ok',
        ]);
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
//        dd($request->all());
        $expense = Expense::find($id);
        $expense->name = $request->name;
        $expense->save();
        
        $expense->annualEstimations()->updateExistingPivot($request->annual_estimation_id, 
        ['annual' => $request->annual, 'january' => $request->january, 'february' => $request->february, 'march' => $request->march, 'april' => $request->april, 'may' => $request->may, 'june' => $request->june, 'july' => $request->july, 'august' => $request->august, 'september' => $request->september, 'octuber' => $request->octuber, 'november' => $request->november, 'december' => $request->december]);
        
        return response()->json([
            'mensaje' => 'ok',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($annual_estimation_id, $id)
    {
        $expense = Expense::find($id);
        $expense->annualEstimations()->detach($annual_estimation_id);
        $expense->delete();
        
        return response()->json([
            'mensaje' => 'ok',
        ]);
    }
}
