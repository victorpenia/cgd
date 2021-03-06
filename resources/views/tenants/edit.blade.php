@extends('layouts.master')
@section('title', 'Editar inquilino')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('content-wrapper')

<section class="content-header">
    <h1>INQUILINO</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('owners.index') }}">PROPIETARIOS</a></li>
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
                    <h3 class="box-title">Editar inquilino</h3>
                </div>
                 <!--/.box-header--> 
                 <!--form start--> 
                <!--<form role="form">-->
                {!! Form::open(['route' => ['tenants.update', $tenant->id], 'method' => 'PUT']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::hidden('id', $tenant->id, ['class' => 'form-control']) !!}                            
                        </div>
                        <div class="form-group">
                            {!! Form::hidden('owner_id', $owner_id, ['class' => 'form-control']) !!}                            
                        </div>
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label>Nombres</label>
                            {!! Form::text('first_name', $tenant->first_name, ['class' => 'form-control', 'placeholder' => 'Nombres', 'maxlength' => '35']) !!}
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div> 
                        <!--last name--> 
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label>Apellidos</label>
                            {!! Form::text('last_name', $tenant->last_name, ['class' => 'form-control', 'placeholder' => 'Apellidos', 'maxlength' => '35']) !!}
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--ci--> 
                        <div class="form-group {{ $errors->has('ci') ? ' has-error' : '' }}">
                            <label>CI</label>
                            {!! Form::text('ci', $tenant->ci, ['class' => 'form-control', 'placeholder' => 'CI', 'maxlength' => '15']) !!}
                            @if ($errors->has('ci'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ci') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--address--> 
                        <div class="form-group">
                            <label>Direcci&oacute;n</label>
                            {!! Form::text('address', $tenant->address, ['class' => 'form-control', 'placeholder' => 'Direcci&oacute;n', 'maxlength' => '100']) !!}
                        </div>
                        <!--cell phone mask--> 
                        <div class="form-group">
                          <label>BOL celular:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('cell_phone', $tenant->cell_phone, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                          </div>
                        </div>
                        <!--phone mask--> 
                        <div class="form-group">
                            <label>BOL Tel&eacute;fono:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('phone_house', $tenant->phone_house, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                          </div>
                        </div>
                        <!--phone mask--> 
                        <div class="form-group">
                            <label>BOL Tel&eacute;fono oficina:</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('phone_office', $tenant->phone_office, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                          </div>
                        </div>
                        <!--address--> 
                        <div class="form-group {{ $errors->has('number_people') ? ' has-error' : '' }}">
                            <label># de Habitantes</label>
                            {!! Form::text('number_people', $tenant->number_people, ['class' => 'form-control', 'placeholder' => '# de Habitantes', 'maxlength' => '2']) !!}
                            @if ($errors->has('number_people'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('number_people') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Estado</label>
                            {!! Form::select('status', ['Activo' => 'Activo', 'Desactivado' => 'Desactivado'], $tenant->status, ['class' => 'form-control']) !!}
                        </div>
                        <!--email address-->
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Correo electr&oacute;nico</label>
                            {!! Form::email('email', $tenant->email, ['class' => 'form-control', 'placeholder' => 'Correo electr&oacute;nico', 'maxlength' => '50']) !!}
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