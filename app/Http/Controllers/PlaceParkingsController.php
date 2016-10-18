<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PlaceParkingRequest;
use App\PlaceParking;
use App\Parking;

class PlaceParkingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $place_parkings = PlaceParking::orderBy('id', 'ASC')->paginate(10);
        return view('placeParkings.index')->with('place_parkings', $place_parkings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('placeParkings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceParkingRequest $request)
    {
        $place_parking = new PlaceParking($request->all());
        $place_parking->user_id = \Auth::user()->id;
        $place_parking->save();
        
//        for($i = 1; $i<= $place_parking->quantity; $i++){
//            $parking = new Parking();
//            $parking->name = $i;
////            $parking->place_parking_id = $place_parking->id;
//            $parking->placeParking()->associate($place_parking);//get id place parking 
//            $parking->save();
//        }
        
        flash('La zona de parqueo '.  $place_parking->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('placeParkings.index');
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
        $place_parking = PlaceParking::find($id);
        return view('placeParkings.edit')->with('place_parking', $place_parking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaceParkingRequest $request, $id)
    {
        $place_parking = PlaceParking::find($id);
        $place_parking->fill($request->all());
        $place_parking->user_id = \Auth::user()->id;
        $place_parking->save();
        
        flash('La zona de parqueo ' . $place_parking->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('placeParkings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place_parking = PlaceParking::find($id);
        $place_parking->delete();
        
        flash('La zona de parqueo ' . $place_parking->name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('placeParkings.index');
    }
}
