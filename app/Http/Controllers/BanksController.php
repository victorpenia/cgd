<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BankRequest;
use App\Bank;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::orderBy('id', 'ASC')->paginate(10);
        return view('banks.index')->with('banks', $banks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        $bank = new Bank($request->all());
        $bank->user_id = \Auth::user()->id;
        $bank->save();
        
        flash('El banco '.  $bank->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('banks.index');
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
        $bank = Bank::find($id);
        return view('banks.edit')->with('bank', $bank);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(bankRequest $request, $id)
    {
        $bank =  Bank::find($id);
        $bank->fill($request->all());
        $bank->user_id = \Auth::user()->id;
        $bank->save();
        
        flash('El banco ' . $bank->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();
        
        flash('El banco ' . $bank->name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('banks.index');
    }
}
