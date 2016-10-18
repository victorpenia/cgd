@extends('layouts.master')
@section('title', 'Editar rol')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="active treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>ROLES</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('roles.index') }}"> Roles</a></li>
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
                    <h3 class="box-title">Editar rol</h3>
                </div>
                 <!--/.box-header--> 
                 <!--form start--> 
                <!--<form role="form">-->
                {!! Form::open(['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::hidden('id', $role->id, ['class' => 'form-control']) !!}
                        </div>
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>Nombre rol:</label>
                            {!! Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => 'Rol', 'maxlength' => '30']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
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