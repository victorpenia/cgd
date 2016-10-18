@extends('layouts.master')
@section('title', 'Crear parqueo')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="active treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@section('content-wrapper')
<section class="content-header">
    <h1>
        ZONA DE PARQUEO: {{ $place_parking->name }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('placeParkings.index') }}">Zonas de parqueo</a></li>
        <li><a href="{{ route('parkings.index', $place_parking_id) }}">Zona</a></li>
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
                    <h3 class="box-title">Nuevo parqueo</h3>
                </div>
                <!--form start-->
                {!! Form::open(['route' => ['parkings.store', $place_parking_id], 'method' => 'POST']) !!}
                    <div class="box-body">
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Parqueo:</label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Parqueo', 'maxlength' => '30']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div>  
                {!! Form::close() !!}
                <!--</form>-->
            </div>
        </div>
    </div>
</section>

@endsection