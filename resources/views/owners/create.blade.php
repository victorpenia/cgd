@extends('layouts.master')
@section('title', 'Crear propietarios')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="active treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>PROPIETARIOS</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('owners.index') }}">Propietarios</a></li>
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
                    <h3 class="box-title">Nuevo propietario</h3>
                </div>
                 <!--/.box-header--> 
                 <!--form start--> 
                <!--<form role="form">-->
                {!! Form::open(['route' => 'owners.store', 'method' => 'POST']) !!}
                    <div class="box-body">
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}" >
                            <label>Nombres:</label>
                            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Nombres', 'maxlength' => '35']) !!}
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div> 
                        <!--last name--> 
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label>Apellidos:</label>
                            {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Apellidos', 'maxlength' => '35']) !!}
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--ci--> 
                        <div class="form-group {{ $errors->has('ci') ? ' has-error' : '' }}">
                            <label>CI:</label>
                            {!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'CI', 'maxlength' => '15']) !!}
                            @if ($errors->has('ci'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ci') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--address--> 
                        <div class="form-group">
                            <label>Direcci&oacute;n:</label>
                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Direcci&oacute;n', 'maxlength' => '100']) !!}
                        </div>
                        <!--cell phone mask--> 
                        <div class="form-group">
                          <label>BOL celular:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('cell_phone', null, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                          </div>
                        </div>
                        <!--phone mask--> 
                        <div class="form-group">
                            <label>BOL Tel&eacute;fono casa:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('phone_house', null, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                          </div>
                        </div>
                        <!--phone mask--> 
                        <div class="form-group">
                            <label>BOL Tel&eacute;fono oficina:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('phone_office', null, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                          </div>
                        </div>
                        <!--email address-->
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Correo electr&oacute;nico:</label>
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Correo electr&oacute;nico', 'maxlength' => '50']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--number people--> 
                        <div class="form-group {{ $errors->has('number_people') ? ' has-error' : '' }}">
                            <label># de Habitantes:</label>
                            {!! Form::text('number_people', null, ['class' => 'form-control', 'placeholder' => '# de Habitantes', 'maxlength' => '2']) !!}
                            @if ($errors->has('number_people'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('number_people') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Departamento:</label>
                            {!! Form::select('department_id', $departments, null, ['class' => 'form-control']) !!}
                        </div>
                        @foreach($place_parkings as $place_parking)
                        <div class="form-group">
                            <label>{{ $place_parking->name }} :</label>
                            <?php $array_parking = array() ?>
                            @foreach($parkings as $parking)
                                @if($place_parking->id == $parking->place_parking_id)
                                    <?php $array_parking[$parking->id] = $parking->name;  ?>

                                @endif
                            @endforeach
                            {!! Form::select('parking_id[]', $array_parking, null, ['class' => 'form-control select2', 'multiple', 'data-placeholder' => 'Seleccionar Parqueo']) !!}
                        </div>                        
                        @endforeach
                        
                        @foreach($place_closets as $place_closet)
                        <div class="form-group">
                            <label>{{ $place_closet->name }}:</label>
                            <?php $array_closet = array() ?>
                            @foreach($closets as $closet)
                                @if($place_closet->id == $closet->place_closet_id)
                                    <?php $array_closet[$closet->id] = $closet->name;  ?>
                                @endif
                            @endforeach
                            {!! Form::select('closet_id[]', $array_closet, null, ['class' => 'form-control select2', 'multiple', 'data-placeholder' => 'Seleccionar Baulera']) !!}
                        </div>                        
                        @endforeach                        
                        
                        <!--select option-->
                        <div class="form-group">
                            <label>Estado:</label>
                            {!! Form::select('status', ['Activo' => 'Activo', 'Desactivado' => 'Desactivado'], null, ['class' => 'form-control']) !!}
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