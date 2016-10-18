@extends('layouts.master')
@section('title', 'Crear planificaci&oacute;n anual')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="active treeview">')
@section('content-wrapper')
<section class="content-header">
    <h1>
        PLANIFICACION ANUAL
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('roles.index') }}">Planificaci&oacute;n anual</a></li>
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
                    <h3 class="box-title">Nuevo planificaci&oacute;n anual</h3>
                </div>
                <!--form start-->
                {!! Form::open(['route' => 'annualEstimations.store', 'method' => 'POST']) !!}
                <div class="box-body">
                    <!--first name--> 
                    <div class="form-group {{ $errors->has('annual_year') ? ' has-error' : '' }}">
                        <label>A&ntilde;o:</label>
                        {!! Form::select('annual_year', ['2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020'], null, ['class' => 'form-control']) !!}
                        @if ($errors->has('annual_year'))
                        <span class="help-block">
                            <strong>{{ $errors->first('annual_year') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div> 
                </div>
                     
                {!! Form::close() !!}
                <!--</form>-->
            </div>
        </div>
    </div>
</section>

@endsection