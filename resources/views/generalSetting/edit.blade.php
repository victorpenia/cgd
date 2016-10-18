@extends('layouts.master')
@section('title', 'Configuraciones generales')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="active treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>
        CONFIGURACIONES GENERALES
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<div class="pad margin no-print">
    <div class="callout callout-danger" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> ADVERTENCIA</h4>
        La modificaci&oacute;n o edici&oacute;n de los parametros generales modificara el calculo. 
    </div>
</div>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> Admistraci&oacute;n.
                <small class="pull-right">Fecha: {{ date('d/m/Y') }}</small>
            </h2>
        </div>
        <!-- /.col -->
    </div>

    {!! Form::open(['route' => ['generalSetting.update', 1], 'method' => 'PUT', 'files' => true]) !!}
        <!-- info row -->
        <div class="row invoice-info">        
            <div class="col-sm-5 invoice-col">          
                <div class="box-body">
                    <div class="form-group">
                        <label class="text-light-blue">Datos Condominio</label>
                    </div>
                    <!--hidden ID--> 
                    <div class="form-group">
                            {!! Form::hidden('id', 1, ['class' => 'form-control']) !!}
                        </div>
                    <!--name--> 
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Nombre del Condominio:</label>
                        {!! Form::text('name', $general_setting->name, ['class' => 'form-control', 'placeholder' => 'Nombre del Condominio', 'maxlength' => '75']) !!}
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!--city--> 
                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                        <label>Ciudad:</label>
                        {!! Form::text('city', $general_setting->city, ['class' => 'form-control', 'placeholder' => 'Ciudad', 'maxlength' => '50']) !!}
                        @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!--address--> 
                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label>Direcci&oacute;n:</label>
                        {!! Form::text('address', $general_setting->address, ['class' => 'form-control', 'placeholder' => 'Direcci&oacute;n', 'maxlength' => '100']) !!}
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!--email address-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo electr&oacute;nico:</label>
                        {!! Form::email('email', $general_setting->email, ['class' => 'form-control', 'placeholder' => 'Correo electr&oacute;nico', 'maxlength' => '50']) !!}                        
                    </div>

                    <!--                <div class="form-group">
                                      <label for="exampleInputFile">File input</label>
                                      <input type="file" id="exampleInputFile">
                    
                                      <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="checkbox">
                                      <label>
                                        <input type="checkbox"> Check me out
                                      </label>
                                    </div>-->
                </div>
                <!-- /.box-body -->

                <!--              <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>-->

            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <div class="box-body">
                    <div class="form-group">
                        <label class="text-light-blue"><br></label>
                    </div>
                    <!--nit--> 
                    <div class="form-group {{ $errors->has('nit') ? ' has-error' : '' }}">
                        <label>Nit:</label>
                        {!! Form::text('nit', $general_setting->nit, ['class' => 'form-control', 'placeholder' => 'Nit', 'maxlength' => '15']) !!}
                        @if ($errors->has('nit'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nit') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!--phone mask--> 
                    <div class="form-group">
                        <label>BOL Tel&eacute;fono:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('phone', $general_setting->phone, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                        </div>
                    </div>
                    <!--cell_phone mask--> 
                    <div class="form-group">
                        <label>BOL Celular:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            {!! Form::text('cell_phone', $general_setting->cell_phone, ['class' => 'form-control', 'data-inputmask' => '"mask": "(9) 999-9999"', 'data-mask']) !!}
                        </div>
                    </div>
                    <!--email address-->
                    <div class="form-group">
                        <label>Web:</label>
                        {!! Form::text('web', $general_setting->web, ['class' => 'form-control', 'placeholder' => 'Web', 'maxlength' => '50']) !!}                        
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-3 invoice-col">
                <div class="box-body">
                    <div class="form-group">
                        <label class="text-light-blue"><br></label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Cargar imagen:</label>
                        <!--<input type="file" id="exampleInputFile">-->
                        {!! Form::file('logo') !!}
                        <p class="help-block">Logotipo 150 x 150.</p>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('dist/img/' . $general_setting->logo)}}" alt="Condominio" class="img-thumbnail">
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- info row -->
        <div class="row invoice-info">

            <div class="col-sm-4 invoice-col">

                <div class="box-body">
                    <div class="form-group">
                        <label class="text-light-blue">Par&aacute;metros Generales</label>
                    </div>
                    <!--select option-->
                    <div class="form-group">
                        <label>Factor Cuota:</label>
                        {!! Form::select('quota_factor', ['Departamento' => 'Departamento', 'M2' => 'M2', 'Proporcionalidad' => 'Proporcionalidad'], $general_setting->quota_factor, ['class' => 'form-control']) !!}
                    </div>
                    <!--Tipo de moneda-->
                    <div class="form-group">
                        <label>Tipo de moneda:</label>
                        {!! Form::select('type_money', ['Bs' => 'Bs', '$us' => '$us'], $general_setting->type_money, ['class' => 'form-control']) !!}
                    </div>
                    <!--Tipo de cambio--> 
                    <div class="form-group {{ $errors->has('type_change') ? ' has-error' : '' }}">
                        <label>Tipo de cambio:</label>
                        {!! Form::text('type_change', $general_setting->type_change, ['class' => 'form-control', 'placeholder' => 'Tipo de cambio', 'maxlength' => '5']) !!}
                        @if ($errors->has('type_change'))
                        <span class="help-block">
                            <strong>{{ $errors->first('type_change') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!--Limite de pago--> 
                    <div class="form-group {{ $errors->has('limit_date_payment') ? ' has-error' : '' }}">
                        <label>Limite de pago:</label>
                        <div class="input-group">
                        {!! Form::text('limit_date_payment', $general_setting->limit_date_payment, ['class' => 'form-control', 'placeholder' => 'Limite de pago', 'maxlength' => '2']) !!}
                            <div class="input-group-addon">Días</div>
                        </div>
                        @if ($errors->has('limit_date_payment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('limit_date_payment') }}</strong>
                        </span>
                        @endif
                    </div>
                    <!--factor de incremento--> 
                    <div class="form-group {{ $errors->has('increment_factor') ? ' has-error' : '' }}">
                        <label>Factor de incremento:</label>
                        <div class="input-group">
                        {!! Form::text('increment_factor', $general_setting->increment_factor, ['class' => 'form-control', 'placeholder' => 'Factor de incremento', 'maxlength' => '5']) !!}
                            <div class="input-group-addon">%</div>
                        </div>
                        @if ($errors->has('increment_factor'))
                        <span class="help-block">
                            <strong>{{ $errors->first('increment_factor') }}</strong>
                        </span>
                        @endif
                    </div>
                                       
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <div class="box-body">
                    <div class="form-group">
                        <label class="text-light-blue"><br></label>
                    </div>
                    <!--Separador decimal-->
                    <div class="form-group">
                        <label>Separador decimal:</label>
                        {!! Form::select('separate_decimal', ['Punto(.)' => 'Punto(.)', 'Coma(,)' => 'Coma(,)'], $general_setting->separate_decimal, ['class' => 'form-control']) !!}
                    </div>
                    <!--Color tema-->
                    <div class="form-group">
                        <label>Color tema:</label>
                        {!! Form::select('theme', ['Azul' => 'Azul', 'Verde' => 'Verde', 'Rojo' => 'Rojo'], $general_setting->theme, ['class' => 'form-control']) !!}
                    </div>
                    <!--Date-->
                    <div class="form-group">
                        <label>Fecha Inicio:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('init_date', date('d/m/Y', strtotime($general_setting->init_date)), ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}
                        </div>
                    </div>
                    <!--Date-->
                    <div class="form-group">
                        <label>Fecha Final:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('end_date', date('d/m/Y', strtotime($general_setting->end_date)), ['class' => 'form-control pull-right', 'id' => 'datepicker1']) !!}
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <div class="box-body">
                    <div class="form-group">
                        <label class="text-light-blue"><br></label>
                    </div>
                    <div class="form-group {{ $errors->has('discount_payment_number') ? ' has-error' : '' }}">
                        <label>Descuento por pronto pago:</label>
                        {!! Form::select('discount_payment', ['Porcentaje' => 'Porcentaje', 'Monto fijo' => 'Monto fijo'], $general_setting->discount_payment, ['class' => 'form-control']) !!}
                        <br>
                        {!! Form::text('discount_payment_number', $general_setting->discount_payment_number, ['class' => 'form-control', 'placeholder' => 'Descuento por pronto pago', 'maxlength' => '5']) !!}
                        <br>
                        {!! Form::select('discount_payment_select', ['Por mes' => 'Por mes', 'Seis meses' => 'Seis meses', 'Doce meses' => 'Doce meses'], $general_setting->discount_payment_select, ['class' => 'form-control']) !!}
                        @if ($errors->has('discount_payment_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('discount_payment_number') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('breach_number') ? ' has-error' : '' }}">
                        <label>Recargo por mora:</label>
                        {!! Form::select('breach', ['Porcentaje' => 'Porcentaje', 'Monto fijo' => 'Monto fijo'], $general_setting->breach, ['class' => 'form-control']) !!}
                        <br>
                        {!! Form::text('breach_number', $general_setting->breach_number, ['class' => 'form-control', 'placeholder' => 'Recargo por mora', 'maxlength' => '5']) !!}
                        <br>
                        {!! Form::select('breach_select', ['Por dia' => 'Por dia', 'Por mes' => 'Por mes'], $general_setting->breach_select, ['class' => 'form-control']) !!}
                        @if ($errors->has('breach_number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('breach_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
              <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>-->
<!--                <button type="button" class="btn btn-primary pull-right"><i class="fa fa-credit-card"></i> Guardar Cambios
                </button>-->
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
<!--                <button type="button" class="btn btn-warning pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Habilitar para edici&oacute;n
                </button>-->
            </div>
        </div>
    {!! Form::close() !!}
</section>

<section class="content-header">
    
</section>

@endsection