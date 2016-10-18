@extends('layouts.master')
@section('title', 'Editar departamento')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="active treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>DEPARTAMENTOS</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('departments.index')}}"> Departamentos</a></li>
    </ol>
</section>

 <!--Main content--> 
<section class="content">
    <div class="row">
         <!--left column--> 
        <div class="col-md-8">
             <!--general form elements--> 
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar departamento</h3>
                </div>
                 <!--/.box-header--> 
                 <!--form start--> 
                <!--<form role="form">-->
                {!! Form::open(['route' => ['departments.update', $department->id], 'method' => 'PUT']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::hidden('id', $department->id, ['class' => 'form-control']) !!}
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Bloque:</label>
                            {!! Form::select('block_id', $blocks, $department->block_id, ['class' => 'form-control']) !!}
                        </div>
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Departamento:</label>
                            {!! Form::text('name', $department->name, ['class' => 'form-control', 'placeholder' => 'Departamento', 'maxlength' => '50']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div> 
                        <!--last name--> 
                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                            <label>C&oacute;digo:</label>
                            {!! Form::text('code', $department->code, ['class' => 'form-control', 'placeholder' => 'C&oacute;digo', 'maxlength' => '15']) !!}
                            @if ($errors->has('code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Piso:</label>
                            {!! Form::select('floor', ['0' => 'PB', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12'], $department->floor, ['class' => 'form-control']) !!}
                        </div>
                        <!--address--> 
                        <div class="form-group {{ $errors->has('area_m2') ? ' has-error' : '' }}">
                            <label>Superficie M2:</label>
                            {!! Form::text('area_m2', $department->area_m2, ['class' => 'form-control', 'placeholder' => 'Superficie M2', 'maxlength' => '7']) !!}
                            @if ($errors->has('area_m2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('area_m2') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Categoria:</label>
                            {!! Form::select('category', ['Departamento' => 'Departamento', 'Penthouse' => 'Penthouse'], $department->category, ['class' => 'form-control']) !!}
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Estado:</label>
                            {!! Form::select('status', ['Activo' => 'Activo', 'Bloqueado' => 'Bloqueado'], $department->status, ['class' => 'form-control']) !!}
                        </div>
                        <!--textarea option-->
                        <div class="form-group">
                            <label>Descripci&oacute;n:</label>
                            {!! Form::textarea('description', $department->description, ['class' => 'form-control', 'rows' => '3', 'style' => 'resize: none', 'maxlength' => '250']) !!}
                        </div>
                    </div>
                     <!--/.box-body--> 
                    <div class="box-footer">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div>  
                {!! Form::close() !!}
                <!--</form>-->
            </div>
             <!--/.box--> 
        </div>
        <!--/.col (all)--> 
    </div>
     <!--/.row--> 
</section>

@endsection