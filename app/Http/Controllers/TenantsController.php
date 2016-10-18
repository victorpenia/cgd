<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TenantRepository;
use App\Http\Requests\TenantRequest;
use App\Http\Requests;
use App\Tenant;

class TenantsController extends Controller
{
    protected $tenants;
    
    public function __construct(TenantRepository $tenants) {
        $this->tenants = $tenants;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($owner_id)
    {
//        dd('hi');
        return view('tenants.index')->with('tenants', $this->tenants->getTenantsforOwner($owner_id))->with('owner_id', $owner_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('tenants.create')->with('owner_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TenantRequest $request, $owner_id)
    {
        $tenant = new Tenant($request->all());
        $tenant->owner_id = $owner_id;
        $tenant->save();
        
        flash('El inquilino '.  $tenant->first_name . ' ' . $tenant->last_name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('tenants.index', $owner_id);
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
        $tenant = Tenant::find($id);
        return view('tenants.edit')->with('owner_id', $owner_id)->with('tenant', $tenant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TenantRequest $request, $id)
    {
        $tenant = Tenant::find($id);
        $tenant->fill($request->all());
        $tenant->save();
        
        flash('El inquilino ' . $tenant->first_name . ' '. $tenant->last_name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('tenants.index', $tenant->owner_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($owner_id, $id)
    {
        $tenant = Tenant::find($id);
        $tenant->delete();
        
        flash('El inquilino ' . $tenant->first_name . ' '. $tenant->last_name . ' ha sido eliminado de forma exitosa!', 'danger')->important();
        return redirect()->route('tenants.index', $owner_id);
    }
}
