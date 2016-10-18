<?php

namespace App\Http\ViewComposers;

//use Illuminate\View\View;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\Department;


class DashboardOneComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
//    protected $building;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
//    public function __construct(Building $building)
//    {
//        // Dependencies automatically resolved by service container...
//        $this->building = $building;
//    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $view->with('count', $this->users->count());
//        $departments = Department::orderBy('floor', 'ASC')->orderBy('code', 'ASC')->get();
//        $departments = Department::belongsToMany('App\Owner')->withTimestamps();
//        $view->with('dashboard_departments', $departments);
        
        $departments = DB::table('departments')
                ->select('departments.*', 'departments.id as department_id', 'owners.*')
                ->leftJoin('owners', 'departments.owner_id', '=', 'owners.id')
                ->orderBy('floor', 'ASC')->orderBy('code', 'ASC')->get();
        
//        $departments = DB::table('departments')
//                ->leftJoin('department_owner', 'departments.id', '=', 'department_owner.department_id')
//                ->leftJoin('owners', 'department_owner.owner_id', '=', 'owners.id')
//                ->orderBy('floor', 'ASC')->orderBy('code', 'ASC')->get();
        
        $view->with('dashboard_departments', $departments);
    }
}
