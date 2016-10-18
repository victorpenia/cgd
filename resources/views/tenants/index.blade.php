@extends('layouts.master')
@section('title', 'Lista inquilinos')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('content-wrapper')

<section class="content-header">
    <h1>INQUILINOS</h1>
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
                    <a href="{{ route('tenants.create', $owner_id) }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nuevo inquilino</a>
                </div>    
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>CI</th>
                                <th>Celular</th>
                                <th>Correo electr&oacute;nico</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenants as $tenant)
                            <tr>
                                <td>{{ $tenant->first_name . ' ' . $tenant->last_name }}</td>
                                <td>{{ $tenant->ci }}</td>
                                <td>{{ $tenant->cell_phone }}</td>
                                <td>{{ $tenant->email }}</td>
                                <td>
                                    @if($tenant->status == 'Activo')
                                    <span class="label label-primary">{{ $tenant->status }}</span>
                                    @else
                                    <span class="label label-warning">{{ $tenant->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tenants.edit', [$owner_id, $tenant->id]) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('tenants.destroy', [$owner_id, $tenant->id]) }}" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>            
                    </table>
                    <div class="text-right">
                        {!! $tenants->render() !!}
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>


@endsection