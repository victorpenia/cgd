<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Repositories\DepartmentRepository;
use App\Http\Requests;
use App\Department;
use App\Owner;
use App\Block;

class DepartmentsController extends Controller
{
    protected $departments;
    
    public function __construct(DepartmentRepository $departments) {
        $this->departments = $departments;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $departments = Department::search($request->name)->orderBy('code', 'ASC')->paginate(10);
////        $departments = Department::orderBy('code', 'ASC')->paginate(10);
//        return view('departments.index')->with('departments', $departments);
        return view('departments.index')->with('departments', $this->departments->getDepartmentsforBlock());        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $blocks = Block::orderBy('name', 'ASC')->lists('name', 'id');
        return view('departments.create')->with('blocks', $blocks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $department = new Department($request->all());
        $department->user_id = \Auth::user()->id;
        $department->save();
        
        flash('El departamento '.  $department->name . ' ha sido creado de forma exiosa!', 'success')->important();
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
//        $department = DB::table('departments')
//                ->where('departments.id', '=', $id)
//                ->Join('roles', 'users.role_id', '=', 'roles.id') 
//                ->first();
//                ->get();
        return response()->json(
                $department
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        $blocks = Block::orderBy('name', 'ASC')->lists('name', 'id');
        return view('departments.edit')->with('department', $department)->with('blocks', $blocks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = Department::find($id);
        $department->fill($request->all());
        $department->user_id = \Auth::user()->id;
        $department->save();
        
        flash('El departamento ' . $department->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);        
        $department->delete();
        
        flash('El departamento ' . $department->name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
        return redirect()->route('departments.index');
    }
    
    /**
     * Assign the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign($owner_id)
    {
        $departments = Department::orderBy('floor', 'ASC')->orderBy('code', 'ASC')->get();
        return view('departments.assign')->with('owner_id', $owner_id)->with('departments', $departments);
//        $department = Department::find($id);        
//        $department->delete();
//        
//        flash('El departamento ' . $department->name . " ha sido eliminado de forma exitosa!" , 'danger')->important();
//        return redirect()->route('departments.index');
    }
    
    public function storeAssign($owner_id, $id){
        $department = Department::find($id);
//        $department->own = 1;
        $department->save();
//        $owner = Owner::find($owner_id);
        $department->owners()->sync([$owner_id]);//create table pivot 
//        $owner->departments()->sync($id);
//        $department->owners()->sync([1, 1]);
        
        flash('El departamento ' . $department->name . " ha sido asignada de forma exitosa!", 'success')->important();
        return redirect()->route('departments.assign', $owner_id);
    }

}
