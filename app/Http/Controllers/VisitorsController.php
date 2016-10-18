<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\VisitorRepository;
use App\Http\Requests\VisitorRequest;
use App\Visitor;

class VisitorsController extends Controller
{
    protected $visitors;
    
    public function __construct(VisitorRepository $visitors) {
        $this->visitors = $visitors;
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($owner_id)
    {
        return view('visitors.index')
            ->with('visitors', $this->visitors->getVisitorsforOwner($owner_id))
            ->with('owner_id', $owner_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('visitors.create')->with('owner_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitorRequest $request, $owner_id)
    {
        $visitor = new Visitor($request->all());
        $visitor->owner_id = $owner_id;
        $visitor->save();
        
        flash('La visita '.  $visitor->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('visitors.index', $owner_id);
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
    public function edit($owner_id, $id)
    {
//        dd('hi edit');
        $visitor = Visitor::find($id);
        return view('visitors.edit')->with('owner_id', $owner_id)->with('visitor', $visitor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorRequest $request, $id)
    {
        $visitor = Visitor::find($id);
        $visitor->fill($request->all());
        $visitor->save();
        
        flash('La visita ' . $visitor->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('visitors.index', $visitor->owner_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($owner_id, $id)
    {
        $visitor = Visitor::find($id);
        $visitor->delete();
        
        flash('La visita '.  $visitor->name . ' ha sido eliminado de forma exitosa!', 'danger')->important();
        return redirect()->route('visitors.index', $owner_id);
    }
}
