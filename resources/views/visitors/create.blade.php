@extends('layouts.master')
@section('title', 'Crear visita')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('content-wrapper')

<section class="content-header">
    <h1>VISITAS</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('users.index') }}">Visitas</a></li>
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
                    <h3 class="box-title">Nuevo visita</h3>
                </div>
                 <!--/.box-header--> 
                 <!--form start--> 
                <!--<form role="form">-->
                {!! Form::open(['route' => ['visitors.store', $owner_id], 'method' => 'POST']) !!}
                    <div class="box-body">
<!--                        <div class="form-group">
                            {!! Form::hidden('owner_id', $owner_id, ['class' => 'form-control']) !!}                            
                        </div> -->
                        <!--first name--> 
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" >
                            <label>Nombres y Apellidos</label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombres y Apellidos', 'maxlength' => '35']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div> 
                        <!--ci--> 
                        <div class="form-group {{ $errors->has('ci') ? ' has-error' : '' }}">
                            <label>CI</label>
                            {!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'CI', 'maxlength' => '15']) !!}
                            @if ($errors->has('ci'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ci') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Parentesco</label>
                            {!! Form::select('relationship', ['Familia' => 'Familia', 'Amigo (a)' => 'Amigo (a)'], null, ['class' => 'form-control']) !!}
                        </div>
                        <!--select option-->
                        <div class="form-group">
                            <label>Estado</label>
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