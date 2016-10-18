@extends('layouts.master')
@section('title', 'Lista propietarios')
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
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('owners.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nuevo propietario</a>
                </div>
                {!! Form::open(['route' => 'owners.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                <div class="form-group">
                    {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                </div>
                {!! Form::close() !!}
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>CI</th>
                                <!--<th>Direcci&oacute;n</th>-->
                                <th>Celular</th>
                                <th>Correo electr&oacute;nico</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($owners as $owner)
                            <tr>
                                <td>{{ $owner->first_name . ' ' . $owner->last_name }}</td>
                                <td>{{ $owner->ci }}</td>
                                <td>{{ $owner->cell_phone }}</td>
                                <td>{{ $owner->email }}</td>
                                <td>
                                    @if($owner->status == 'Activo')
                                    <span class="label label-primary">{{ $owner->status }}</span>
                                    @else
                                    <span class="label label-warning">{{ $owner->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tenants.index', $owner->id) }}" title="Ver Inquilinos"><span class="label label-primary"><i class="fa fa-user"></i></span></a>
                                    <a href="{{ route('visitors.index', $owner->id) }}" title="Ver Visitas"><span class="label label-success"><i class="fa fa-users"></i></span></a>
                                    <!--<a href="{{ route('departments.assign', $owner->id) }}" title="Asignar Departamento"><span class="label label-info"><i class="fa fa-building"></i></span></a>-->
                                    <a href="{{ route('owners.edit', $owner->id) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('owners.destroy', $owner->id) }}" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>            
                    </table>
                    <div class="text-right">
                        {!! $owners->render() !!}
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>


@endsection