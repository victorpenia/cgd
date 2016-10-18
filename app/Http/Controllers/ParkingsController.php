<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ParkingRepository;
use App\Http\Requests\ParkingRequest;
use App\Http\Requests;
use App\Parking;
use App\PlaceParking;

class ParkingsController extends Controller
{
    protected $parkings;
    
    public function __construct(ParkingRepository $parkings) {
        $this->parkings = $parkings;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($place_parking_id)
    {
        $place_parking = PlaceParking::find($place_parking_id);
        return view('parkings.index')
            ->with('parkings', $this->parkings->getParkingsforPlaceParking($place_parking_id))
            ->with('place_parking', $place_parking)
            ->with('place_parking_id', $place_parking_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($place_parking_id)
    {
        $place_parking = PlaceParking::find($place_parking_id);
        return view('parkings.create')
                ->with('place_parking', $place_parking)
                ->with('place_parking_id', $place_parking_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkingRequest $request, $place_parking_id)
    {
        $parking = new Parking($request->all());
        $parking->user_id = \Auth::user()->id;
        $parking->place_parking_id = $place_parking_id;
        $parking->save();
        
        flash('El parqueo '.  $parking->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('parkings.index', $place_parking_id);
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
    public function edit($place_parking_id, $id)
    {
        $parking = Parking::find($id);
        $place_parking = PlaceParking::find($place_parking_id);
        return view('parkings.edit')
                ->with('place_parking_id', $place_parking_id)
                ->with('place_parking', $place_parking)
                ->with('parking', $parking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParkingRequest $request, $id)
    {
        $parking = Parking::find($id);
        $parking->fill($request->all());
        $parking->user_id = \Auth::user()->id;
        $parking->save();
        
        flash('El parqueo ' . $parking->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('parkings.index', $parking->place_parking_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($place_parking_id, $id)
    {
        $parking = Parking::find($id);
        $parking->delete();
        
        flash('El parqueo '.  $parking->name . ' ha sido eliminado de forma exitosa!', 'danger')->important();
        return redirect()->route('parkings.index', $place_parking_id);
    }
}
