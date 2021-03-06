@extends('layouts.master')
@section('title', 'Editar usuario')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="active treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>USUARIOS</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('users.index') }}"> Usuarios</a></li>
        <!--<li class="active">General Elements</li>-->
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
                    <h3 class="box-title">Editar usuario</h3>
                </div>
                 <!--/.box-header--> 
                 <!--form start--> 
                <!--<form role="form">-->
                {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::hidden('id', $user->id, ['class' => 'form-control']) !!}                            
                        </div> 
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label>Nombres:</label>
                            {!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => 'Nombres', 'maxlength' => '35']) !!}
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div> 
                        <!--last name--> 
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label>Apellidos:</label>
                            {!! Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => 'Apellidos', 'maxlength' => '35']) !!}
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--address--> 
                        <div class="form-group">
                            <label>Direcci&oacute;n:</label>
                            {!! Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Direcci&oacute;n', 'maxlength' => '100']) !!}
                        </div>
                        <!--cell phone mask--> 
                        <div class="form-group">
                          <label>BOL celular:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('cell_phone', $user->cell_phone, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                          </div>
                        </div>
                        <!--phone mask--> 
                        <div class="form-group">
                            <label>BOL Tel&eacute;fono:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                          </div>
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Estado:</label>
                            {!! Form::select('status', ['Activo' => 'Activo', 'Bloqueado' => 'Bloqueado'], $user->status, ['class' => 'form-control']) !!}
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Permiso:</label>
                            {!! Form::select('role_id', $roles, $user->role_id, ['class' => 'form-control']) !!}
                        </div>
                        <!--email address-->
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Correo electr&oacute;nico:</label>
                            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Correo electr&oacute;nico', 'maxlength' => '50']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
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