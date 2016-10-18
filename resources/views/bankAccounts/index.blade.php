@extends('layouts.master')
@section('title', 'Lista parqueos')
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
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('bankAccounts.create', $bank_id) }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nueva cuenta</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>N&uacute;mero de cuenta</th>
                                <th>Tipo de moneda</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bank_accounts as $bank_account)
                            <tr>
                                <td>{{ $bank_account->number_account }}</td>
                                <td>{{ $bank_account->type_money }}</td>
                                <td>                     
                                    <a href="{{ route('bankAccounts.edit', [$bank_id, $bank_account->id]) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('bankAccounts.destroy', [$bank_id, $bank_account->id]) }}" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>                        
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    {!! $bank_accounts->render() !!}
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>

@endsection