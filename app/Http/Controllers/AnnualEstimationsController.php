<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AnnualEstimation;
use App\Http\Requests\AnnualEstimationRequest;

class AnnualEstimationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annual_estimations = AnnualEstimation::orderBy('id', 'ASC')->paginate(20);
        return view('annualEstimations.index')->with('annual_estimations', $annual_estimations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annualEstimations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnualEstimationRequest $request)
    {
        $annual_estimation = new AnnualEstimation($request->all());
        $annual_estimation->user_id = \Auth::user()->id;
        $annual_estimation->status = 'Activo';
        $annual_estimation->save();
        
        flash('La planificación anual '.  $annual_estimation->annual_year . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('annualEstimations.index');
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
        $annual_estimation = AnnualEstimation::find($id);
        return view('annualEstimations.edit')->with('annual_estimation', $annual_estimation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnualEstimationRequest $request, $id)
    {
        $annual_estimation = AnnualEstimation::find($id);
        $annual_estimation->fill($request->all());
        $annual_estimation->user_id = \Auth::user()->id;
        $annual_estimation->save();
        
        flash('La planificación anual ' . $annual_estimation->annual_year . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('annualEstimations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
