<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth', 'superadmin']], function(){
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/destroy', ['uses' => 'UsersController@destroy', 'as' => 'users.destroy']);
    
    Route::resource('roles', 'RolesController');
    Route::get('roles/{id}/destroy', ['uses' => 'RolesController@destroy', 'as' => 'roles.destroy']);
    
    Route::get('generalSetting/{generalSetting}/edit', ['uses' => 'GeneralSettingController@edit', 'as' => 'generalSetting.edit']);
    Route::put('generalSetting/{generalSetting}', ['uses' => 'GeneralSettingController@update', 'as' => 'generalSetting.update']);
    
    Route::resource('annualEstimations', 'AnnualEstimationsController');
    Route::get('annualEstimations/{id}/activities/view', ['uses' => 'ActivitiesController@view', 'as' => 'activities.view']);
    
    Route::get('annualEstimations/{id}/payments', ['uses' => 'PaymentsAjaxController@index', 'as' => 'paymentsAjax.index']);
    Route::get('annualEstimations/{id}/concepts', ['uses' => 'PaymentsAjaxController@listing', 'as' => 'paymentsAjax.listing']);
    Route::get('annualEstimations/{id}/payments/create', ['uses' => 'PaymentsAjaxController@create', 'as' => 'paymentsAjax.create']);
    Route::post('payments/store', ['uses' => 'PaymentsAjaxController@store', 'as' => 'paymentsAjax.store']);
    Route::put('annualEstimations/{id}/payments', ['uses' => 'PaymentsAjaxController@update', 'as' => 'paymentsAjax.update']);
    Route::get('annualEstimations/{annual_estimation_id}/payments/{id}/destroy', ['uses' => 'PaymentsAjaxController@destroy', 'as' => 'paymentsAjax.destroy']);
    
    Route::get('annualEstimations/{id}/expenses', ['uses' => 'ExpensesAjaxController@index', 'as' => 'expensesAjax.index']);
    Route::get('annualEstimations/{id}/listing', ['uses' => 'ExpensesAjaxController@listing', 'as' => 'expensesAjax.listing']);
    Route::get('annualEstimations/{id}/expenses/create', ['uses' => 'ExpensesAjaxController@create', 'as' => 'expensesAjax.create']);
    Route::post('expenses/store', ['uses' => 'ExpensesAjaxController@store', 'as' => 'expensesAjax.store']);
    Route::put('annualEstimations/{id}/expenses', ['uses' => 'ExpensesAjaxController@update', 'as' => 'expensesAjax.update']);
    Route::get('annualEstimations/{annual_estimation_id}/expenses/{id}/destroy', ['uses' => 'ExpensesAjaxController@destroy', 'as' => 'expensesAjax.destroy']);
    
//    Route::get('annualEstimations/{id}/view', ['uses' => 'AnnualEstimationsController@view', 'as' => 'annualEstimations.view']);    
//    Route::resource('activities', 'ActivitiesController');
//    Route::get('annualEstimations/{id}/activities', ['uses' => 'ActivitiesController@index', 'as' => 'activities.index']);
//    Route::get('annualEstimations/{id}/activities/view', ['uses' => 'ActivitiesController@view', 'as' => 'activities.view']);
//    Route::get('annualEstimations/{id}/concepts', ['uses' => 'ActivitiesController@listing', 'as' => 'activities.listing']);
//    Route::get('activities/{id}/create', ['uses' => 'ActivitiesController@create', 'as' => 'activities.create']);
//    Route::post('activities/store', ['uses' => 'ActivitiesController@store', 'as' => 'activities.store']);
//    Route::get('activities/{id}/destroy', ['uses' => 'ActivitiesController@destroy', 'as' => 'activities.destroy']);    
//    Route::put('annualEstimations/{id}/activities', ['uses' => 'ActivitiesController@update', 'as' => 'activities.update']);
    
    Route::resource('blocks', 'blocksController');
    Route::get('blocks/{id}/destroy', ['uses' => 'blocksController@destroy', 'as' => 'blocks.destroy']);
    Route::resource('departments', 'DepartmentsController');
    Route::get('departments/{id}/destroy', ['uses' => 'DepartmentsController@destroy', 'as' => 'departments.destroy']);
    Route::get('owners/{id}/departments/assign', ['uses' => 'DepartmentsController@assign', 'as' => 'departments.assign']);
    Route::get('owners/{owner_id}/departments/{id}/storeAssign', ['uses' => 'DepartmentsController@storeAssign', 'as' => 'departments.storeAssign']);
    
    Route::resource('placeParkings', 'PlaceParkingsController');
    Route::get('placeParkings/{id}/destroy', ['uses' => 'PlaceParkingsController@destroy', 'as' => 'placeParkings.destroy']);
    Route::get('placeParkings/{id}/parkings', ['uses' => 'ParkingsController@index', 'as' => 'parkings.index']);
    Route::get('placeParkings/{id}/parkings/create', ['uses' => 'ParkingsController@create', 'as' => 'parkings.create']);
    Route::post('placeParkings/{id}/parkings', ['uses' => 'ParkingsController@store', 'as' => 'parkings.store']);
    Route::get('placeParkings/{id}/parkings/{parking}/edit', ['uses' => 'ParkingsController@edit', 'as' => 'parkings.edit']);
    Route::put('placeParkings/{id}/parkings', ['uses' => 'ParkingsController@update', 'as' => 'parkings.update']);
    Route::get('placeParkings/{place_parking_id}/parkings/{id}/destroy', ['uses' => 'ParkingsController@destroy', 'as' => 'parkings.destroy']);
    
    Route::resource('placeClosets', 'PlaceClosetsController');
    Route::get('placeClosets/{id}/destroy', ['uses' => 'PlaceClosetsController@destroy', 'as' => 'placeClosets.destroy']);
    Route::get('placeClosets/{id}/closets', ['uses' => 'ClosetsController@index', 'as' => 'closets.index']);
    Route::get('placeClosets/{id}/closets/create', ['uses' => 'ClosetsController@create', 'as' => 'closets.create']);
    Route::post('placeClosets/{id}/closets', ['uses' => 'ClosetsController@store', 'as' => 'closets.store']);
    Route::get('placeClosets/{id}/closets/{closet}/edit', ['uses' => 'ClosetsController@edit', 'as' => 'closets.edit']);
    Route::put('placeClosets/{id}/closets', ['uses' => 'ClosetsController@update', 'as' => 'closets.update']);
    Route::get('placeClosets/{place_closets_id}/closets/{id}/destroy', ['uses' => 'ClosetsController@destroy', 'as' => 'closets.destroy']);
    
    Route::resource('commonAreas', 'CommonAreasController');
    Route::get('commonAreas/{id}/destroy', ['uses' => 'CommonAreasController@destroy', 'as' => 'commonAreas.destroy']);
    
    Route::resource('banks', 'BanksController');
    Route::get('banks/{id}/destroy', ['uses' => 'BanksController@destroy', 'as' => 'banks.destroy']);
    Route::get('banks/{id}/bankAccounts', ['uses' => 'BankAccountsController@index', 'as' => 'bankAccounts.index']);
    Route::get('banks/{id}/bankAccounts/create', ['uses' => 'BankAccountsController@create', 'as' => 'bankAccounts.create']);
    Route::post('banks/{id}/bankAccounts', ['uses' => 'BankAccountsController@store', 'as' => 'bankAccounts.store']);
    Route::get('banks/{id}/bankAccounts/{bankAccount}/edit', ['uses' => 'BankAccountsController@edit', 'as' => 'bankAccounts.edit']);
    Route::put('banks{id}/bankAccounts', ['uses' => 'BankAccountsController@update', 'as' => 'bankAccounts.update']);
    Route::get('banks/{bank_id}/bankAccounts/{id}/destroy', ['uses' => 'BankAccountsController@destroy', 'as' => 'bankAccounts.destroy']);
    
    Route::resource('owners', 'OwnersController');
    Route::get('owners/{id}/destroy', ['uses' => 'OwnersController@destroy', 'as' => 'owners.destroy']);
       
    
    Route::get('owners/{id}/visitors', ['uses' => 'VisitorsController@index', 'as' => 'visitors.index']);
    Route::get('owners/{id}/visitors/create', ['uses' => 'VisitorsController@create', 'as' => 'visitors.create']);
    Route::post('owners/{id}/visitors', ['uses' => 'VisitorsController@store', 'as' => 'visitors.store']);
    Route::get('owners/{id}/visitors/{visitors}/edit', ['uses' => 'VisitorsController@edit', 'as' => 'visitors.edit']);
    Route::put('owners/{id}/visitors', ['uses' => 'VisitorsController@update', 'as' => 'visitors.update']);
    Route::get('owners/{owner_id}/visitors/{id}/destroy', ['uses' => 'VisitorsController@destroy', 'as' => 'visitors.destroy']);
    
    Route::get('owners/{id}/tenants', ['uses' => 'TenantsController@index', 'as' => 'tenants.index']);
    Route::get('owners/{id}/tenants/create', ['uses' => 'TenantsController@create', 'as' => 'tenants.create']);
    Route::post('owners/{id}/tenants', ['uses' => 'TenantsController@store', 'as' => 'tenants.store']);
    Route::get('owners/{id}/tenants/{tenants}/edit', ['uses' => 'TenantsController@edit', 'as' => 'tenants.edit']);
    Route::put('owners/{id}/tenants', ['uses' => 'TenantsController@update', 'as' => 'tenants.update']);
    Route::get('owners/{owner_id}/tenants/{id}/destroy', ['uses' => 'TenantsController@destroy', 'as' => 'tenants.destroy']);
    

});

Route::group(['middleware' => 'auth'], function(){
    Route::resource('dashboard', 'DashboardController'); 
//    Route::get('/home', 'DashboardController@index');
});


