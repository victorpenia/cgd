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
        BANCO: {{ $bank->name }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('banks.index') }}"> Bancos</a></li>
        <li><a href="{{ route('bankAccounts.index', $bank_id) }}"> Cuentas</a></li>
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
                    <h3 class="box-title">Nueva cuenta</h3>
                </div>
                <!--form start-->
                {!! Form::open(['route' => ['bankAccounts.store', $bank_id], 'method' => 'POST']) !!}
                    <div class="box-body">
                        <!--number account--> 
                        <div class="form-group {{ $errors->has('number_account') ? ' has-error' : '' }}">
                            <label>N&uacute;mero de cuenta:</label>
                            {!! Form::text('number_account', null, ['class' => 'form-control', 'placeholder' => 'N&uacute;mero de cuenta', 'maxlength' => '30']) !!}
                            @if ($errors->has('number_account'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('number_account') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!--type money--> 
                        <div class="form-group">
                            <label>Tipo moneda:</label>
                            {!! Form::select('type_money', ['Moneda Nacional' => 'Moneda Nacional', 'Moneda Extranjera' => 'Moneda Extranjera'], null, ['class' => 'form-control']) !!}
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