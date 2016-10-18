<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnerRequest;

use App\Http\Requests;
use App\Owner;
use App\Department;
use App\PlaceParking;
use App\Parking;
use App\PlaceCloset;
use App\Closet;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $owners = Owner::search($request->name)->orderBy('first_name', 'ASC')->paginate(10);
        return view('owners.index')->with('owners', $owners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::where('owner_id', null)->orderBy('floor', 'ASC')->orderBy('code', 'ASC')->lists('name', 'id');
        $place_parkings = PlaceParking::orderBy('name', 'ASC')->get();
        $parkings = Parking::where('owner_id', null)->orderBy('name', 'ASC')->get();  //orderBy('name', 'ASC')->get();
        $place_closets = PlaceCloset::orderBy('name', 'ASC')->get();
        $closets = Closet::where('owner_id', null)->orderBy('name', 'ASC')->get();
        return view('owners.create')
            ->with('departments', $departments)
            ->with('place_parkings', $place_parkings)
            ->with('parkings', $parkings)
            ->with('place_closets', $place_closets)
            ->with('closets', $closets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnerRequest $request)
    {
        $owner = new Owner($request->all());
        $owner->save();
        $department_id = $request->department_id;
        $parking_ids = $request->parking_id;
        $closet_ids = $request->closet_id;
        
        $department = Department::find($department_id);
        $department->owner()->associate($owner);
        $department->save();
        
        if($parking_ids != null){
            foreach($parking_ids as $parking_id){
                $parking = Parking::find($parking_id);
                $parking->owner()->associate($owner);
                $parking->save();
            }
        }
        
        if($closet_ids != null){
            foreach($closet_ids as $closet_id){
                $closet = Closet::find($closet_id);
                $closet->owner()->associate($owner);
                $closet->save();
            }
        }
        
        
        flash('El propietario '.  $owner->first_name . ' ' . $owner->last_name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('owners.index');
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
        $owner = Owner::find($id);
        $department = Department::where('owner_id',$owner->id)->first();
        $parking_ids = Parking::where('owner_id', $owner->id)->lists('id')->toArray();
        $closet_ids = Closet::where('owner_id', $owner->id)->lists('id')->toArray();
        
        $departments = Department::where('owner_id', null)->orWhere('owner_id', $owner->id)->orderBy('id', 'ASC')->lists('name', 'id');
        $place_parkings = PlaceParking::orderBy('name', 'ASC')->get();
        $parkings = Parking::where('owner_id', null)->orWhere('owner_id', $owner->id)->orderBy('name', 'ASC')->get();  //orderBy('name', 'ASC')->get();
        $place_closets = PlaceCloset::orderBy('name', 'ASC')->get();
        $closets = Closet::where('owner_id', null)->orWhere('owner_id', $owner->id)->orderBy('name', 'ASC')->get();
        
        return view('owners.edit')
            ->with('owner', $owner)
            ->with('department', $department)
            ->with('parking_ids', $parking_ids)
            ->with('closet_ids', $closet_ids)
            ->with('departments', $departments)
            ->with('place_parkings', $place_parkings)
            ->with('parkings', $parkings)
            ->with('place_closets', $place_closets)
            ->with('closets', $closets);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnerRequest $request, $id)
    {
        $owner = Owner::find($id);
        $owner->fill($request->all());
        $owner->save();
        
        $department_id = $request->department_id;
        $parking_ids = $request->parking_id;
        $closet_ids = $request->closet_id;
        
        if($request->department_old_id != $department_id){
            $department = Department::find($department_id);
            $department->owner_id = $owner->id;
            $department->save();
            
            $department_old = Department::find($request->department_old_id);
            $department_old->owner_id = null;
            $department_old->save();
        }
        
        $parking = Parking::where('owner_id', $id)->update(['owner_id' => null]);

        if($parking_ids != null){
            foreach($parking_ids as $parking_id){
                $parking = Parking::find($parking_id);
                $parking->owner()->associate($owner);
                $parking->save();
            }
        }
        
        $closet = Closet::where('owner_id', $id)->update(['owner_id' => null]);

        if($closet_ids != null){
            foreach($closet_ids as $closet_id){
                $closet = Parking::find($closet_id);
                $closet->owner()->associate($owner);
                $closet->save();
            }
        }
        
        
        flash('El propietario ' . $owner->first_name . ' ' . $owner->last_name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = Owner::find($id);
        $owner->delete();
        
        flash('El propietario ' . $owner->first_name . ' ' . $owner->last_name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('owners.index');
    }
}
