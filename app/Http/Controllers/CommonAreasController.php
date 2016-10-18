<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommonAreaRequest;
use App\Http\Requests;
use App\CommonAreas;

class CommonAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commonAreas = CommonAreas::orderBy('id', 'ASC')->get();
        return view('commonAreas.index')->with('commonAreas', $commonAreas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commonAreas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommonAreaRequest $request)
    {
        $common_area = new CommonAreas($request->all());
        $common_area->user_id = \Auth::user()->id;
        $common_area->save();
        
        flash('El área común '.  $common_area->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('commonAreas.index');
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
        $common_area = CommonAreas::find($id);
        return view('commonAreas.edit')->with('common_area', $common_area); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommonAreaRequest $request, $id)
    {
        $common_area = CommonAreas::find($id);
        $common_area->fill($request->all());
//        dd($common_area);
        $common_area->user_id = \Auth::user()->id;
        $common_area->save();
        
        flash('El área común ' . $common_area->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('commonAreas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $common_area = CommonAreas::find($id);
        $common_area->delete();
        
        flash('El área común ' . $common_area->name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('commonAreas.index');
    }
}
