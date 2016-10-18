<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlockRequest;
use App\Http\Requests;
use App\Block;

class BlocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::orderBy('id', 'ASC')->get();
        return view('blocks.index')->with('blocks', $blocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlockRequest $request)
    {
        $block = new Block($request->all());
        $block->user_id = \Auth::user()->id;
        $block->save();
        
        flash('El bloque '.  $block->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('blocks.index');
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
        $block = Block::find($id);
        return view('blocks.edit')->with('block', $block);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlockRequest $request, $id)
    {
        $block = Block::find($id);
        $block->fill($request->all());
        $block->user_id = \Auth::user()->id;
        $block->save();
        
        flash('El bloque ' . $block->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('blocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $block = Block::find($id);
        $block->delete();
        
        flash('El bloque ' . $block->name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('blocks.index');
    }
}
