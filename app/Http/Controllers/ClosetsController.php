<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClosetRepository;
use App\Http\Requests;
use App\Http\Requests\ClosetRequest;
use App\PlaceCloset;
use App\Closet;

class ClosetsController extends Controller
{
    protected $closets;
    
    public function __construct(ClosetRepository $closets) {
        $this->closets = $closets;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($place_closet_id)
    {
        $place_closet = PlaceCloset::find($place_closet_id);
        return view('closets.index')
            ->with('closets', $this->closets->getClosetsforPlaceCloset($place_closet_id))
            ->with('place_closet', $place_closet)
            ->with('place_closet_id', $place_closet_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($place_closet_id)
    {
        $place_closet = PlaceCloset::find($place_closet_id);
        return view('closets.create')
            ->with('place_closet', $place_closet)
            ->with('place_closet_id', $place_closet_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClosetRequest $request, $place_closet_id)
    {
        $closet = new Closet($request->all());
        $closet->user_id = \Auth::user()->id;
        $closet->place_closet_id = $place_closet_id;
        $closet->save();
        
        flash('La baulera '.  $closet->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('closets.index', $place_closet_id);
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
    public function edit($place_closet_id, $id)
    {
        $closet = Closet::find($id);
        $place_closet = PlaceCloset::find($place_closet_id);
        return view('closets.edit')
                ->with('place_closet_id', $place_closet_id)
                ->with('place_closet', $place_closet)
                ->with('closet', $closet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClosetRequest $request, $id)
    {
        $closet = Closet::find($id);
        $closet->fill($request->all());
        $closet->user_id = \Auth::user()->id;
        $closet->save();
        
        flash('La baulera ' . $closet->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('closets.index', $closet->place_closet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($place_closet_id, $id)
    {
        $closet = Closet::find($id);
        $closet->delete();
        
        flash('La baulera '.  $closet->name . ' ha sido eliminado de forma exitosa!', 'danger')->important();
        return redirect()->route('closets.index', $place_closet_id);
    }
}
