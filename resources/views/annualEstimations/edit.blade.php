@extends('layouts.master')
@section('title', 'Editar rol')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="active treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>ROLES</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('annualEstimations.index') }}">Planificaci&oacute;n anual</a></li>
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
                    <h3 class="box-title">Editar planificaci&oacute;n anual</h3>
                </div>
                 <!--/.box-header--> 
                 <!--form start--> 
                <!--<form role="form">-->
                {!! Form::open(['route' => ['annualEstimations.update', $annual_estimation->id], 'method' => 'PUT']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::hidden('id', $annual_estimation->id, ['class' => 'form-control']) !!}
                        </div>
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('annual_year') ? ' has-error' : '' }}">
                            <label>A&ntilde;o:</label>
                            {!! Form::select('annual_year', ['2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020'], $annual_estimation->annual_year, ['class' => 'form-control']) !!}
                            @if ($errors->has('annual_year'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('annual_year') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Estado:</label>
                            {!! Form::select('status', ['Activo' => 'Activo', 'Cerrado' => 'Cerrado'], $annual_estimation->status, ['class' => 'form-control']) !!}
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