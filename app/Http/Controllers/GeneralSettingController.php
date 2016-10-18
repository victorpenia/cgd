<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GeneralSettingRequest;
use App\GeneralSetting;

class GeneralSettingController extends Controller
{
    public function edit($id){
        $general_setting = GeneralSetting::find($id);
        return view('generalSetting.edit')->with('general_setting', $general_setting);
    }
    
    public function update(GeneralSettingRequest $request, $id){
        $general_setting = GeneralSetting::find($id);
        $general_setting->fill($request->all());
        $general_setting->init_date = date('Y-m-d', strtotime(str_replace('/', '-', $general_setting->init_date)));
        $general_setting->end_date = date('Y-m-d', strtotime(str_replace('/', '-', $general_setting->end_date)));
        if($request->file('logo')){
            $file = $request->file('logo');
            $file_name = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/dist/img/';
            $file->move($path, $file_name);
            $general_setting->logo = $file_name;
        }        
//        dd($init_date);
        $general_setting->save();
        
        flash('La configuración general del sistema de ' . $general_setting->name . " ha sido actualizado de forma exitosa!" , 'warning')->important();
        return redirect()->route('generalSetting.edit', $id);
        
    }
}
