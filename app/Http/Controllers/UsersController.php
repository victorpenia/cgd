<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function index(Request $request){
        $users = User::search($request->name)->orderBy('first_name', 'ASC')->paginate(10);
        $users->each(function($users){
            $users->role;
        });
        return view('users.index')->with('users', $users);
    }
    
    public function create(){
        $roles = Role::orderBy('id', 'ASC')->lists('name', 'id');        
        return view('users.create')->with('roles', $roles);
    }
    
    public function store(UserRequest $request){
        
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->general_setting_id = 1;
        $user->save();
        
        flash('El usuario '.  $user->first_name . ' ' . $user->last_name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('users.index');
    }
    
    public function show($id){
        $user = DB::table('users')
                ->where('users.id', '=', $id)
                ->Join('roles', 'users.role_id', '=', 'roles.id') 
                ->first();
//                ->get();
        return response()->json(
                $user
        );
    }
    
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        
        flash('El usuario ' . $user->first_name . ' ' . $user->last_name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('users.index');
    }

    public function edit($id){
        $roles = Role::orderBy('id', 'ASC')->lists('name', 'id'); 
        $user = User::find($id);
        return view('users.edit')->with('user', $user)->with('roles', $roles);
    }
    
    public function update(UserRequest $request, $id){
        $user = User::find($id);
        $user->fill($request->all());
//        $user->first_name = $request->first_name;
//        $user->last_name = $request->last_name;
//        $user->address = $request->address;
//        $user->cell_phone = $request->cell_phone;
//        $user->phone = $request->phone;
//        $user->email = $request->email;
        $user->save();
        
        flash('El usuario ' . $user->first_name . ' ' . $user->last_name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('users.index');
        
    }
}
