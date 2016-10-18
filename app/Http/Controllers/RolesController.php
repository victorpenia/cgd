<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Requests;
use App\Role;


class RolesController extends Controller
{
    public function index(){
        $roles = Role::orderBy('id', 'ASC')->paginate(10);
        return view('roles.index')->with('roles', $roles);
    }
    
    public function create(){
        return view('roles.create');
    }
    
    public function store(RoleRequest $request){
        $role = new Role($request->all());
        $role->save();
        
        flash('El rol '.  $role->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('roles.index');
    }
    
    public function show($id){
        
    } 
    
    public function edit($id){
        $role = Role::find($id);
        return view('roles.edit')->with('role', $role);        
    }
    
    public function update(RoleRequest $request, $id){
        $role = Role::find($id);
        $role->fill($request->all());
        $role->save();
        
        flash('El rol ' . $role->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('roles.index');
        
    }
    
    public function destroy($id){
        $role = Role::find($id);
        $role->delete();
        
        flash('El rol ' . $role->name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('roles.index');
    }
}
