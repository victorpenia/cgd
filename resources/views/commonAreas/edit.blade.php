@extends('layouts.master')
@section('title', 'Lista Areas comunes')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="active treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>AREAS COMUNES</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('commonAreas.index') }}"> Areas comunes</a></li>
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
                    <h3 class="box-title">Editar &aacute;rea com&uacute;n</h3>
                </div>
                 <!--/.box-header--> 
                 <!--form start--> 
                <!--<form role="form">-->
                {!! Form::open(['route' => ['commonAreas.update', $common_area->id], 'method' => 'PUT']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::hidden('id', $common_area->id, ['class' => 'form-control']) !!}
                        </div>
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Area:</label>
                            {!! Form::text('name', $common_area->name, ['class' => 'form-control', 'placeholder' => 'Area', 'maxlength' => '30']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--codigo--> 
                        <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                            <label>C&oacute;digo:</label>
                            {!! Form::text('code', $common_area->code, ['class' => 'form-control', 'placeholder' => 'C&oacute;digo', 'maxlength' => '15']) !!}
                            @if ($errors->has('code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--precio--> 
                        <div class="form-group {{ $errors->has('price_one') ? ' has-error' : '' }}">
                            <label>Precio uno:</label>
                            {!! Form::text('price_one', $common_area->price_one, ['class' => 'form-control', 'placeholder' => 'Precio uno', 'maxlength' => '9']) !!}
                            @if ($errors->has('price_one'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price_one') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--precio--> 
                        <div class="form-group {{ $errors->has('price_two') ? ' has-error' : '' }}">
                            <label>Precio dos:</label>
                            {!! Form::text('price_two', $common_area->price_two, ['class' => 'form-control', 'placeholder' => 'Precio dos', 'maxlength' => '9']) !!}
                            @if ($errors->has('price_two'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price_two') }}</strong>
                                </span>
                            @endif
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