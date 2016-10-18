<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PlaceClosetRequest;
use App\Http\Requests;
use App\PlaceCloset;
use App\Closet;

class PlaceClosetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $place_closets = PlaceCloset::orderBy('id', 'ASC')->paginate(10);
        return view('placeClosets.index')->with('place_closets', $place_closets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('placeClosets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceClosetRequest $request)
    {
        $place_closet = new PlaceCloset($request->all());
        $place_closet->user_id = \Auth::user()->id;
        $place_closet->save();
        
        flash('La zona de baulera '.  $place_closet->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('placeClosets.index');
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
        $place_closet = PlaceCloset::find($id);
        return view('placeClosets.edit')-> with('place_closet', $place_closet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaceClosetRequest $request, $id)
    {
        $place_closet = PlaceCloset::find($id);
        $place_closet->fill($request->all());
        $place_closet->user_id = \Auth::user()->id;
        $place_closet->save();
        
        flash('La zona de baulera ' . $place_closet->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('placeClosets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place_closet = PlaceCloset::find($id);
        $place_closet->delete();
        
        flash('La zona de baulera ' . $place_closet->name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('placeClosets.index');
    }
}
