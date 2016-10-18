@extends('layouts.master')
@section('title', 'Lista visitas')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('content-wrapper')

<section class="content-header">
    <h1>Visitas frecuentes de : Nombre propietario</h1>
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
                    <a href="{{ route('visitors.create', $owner_id) }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nueva visita</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>CI</th>
                                <th>Parentesco</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visitors as $visitor)
                            <tr>
                                <td>{{ $visitor->name }}</td>
                                <td>{{ $visitor->ci }}</td>
                                <td>{{ $visitor->relationship }}</td>
                                <td>
                                    @if($visitor->status == 'Activo')
                                    <span class="label label-primary">{{ $visitor->status }}</span>
                                    @else
                                    <span class="label label-warning">{{ $visitor->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('visitors.edit', [$owner_id, $visitor->id]) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('visitors.destroy', [$owner_id, $visitor->id]) }}" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>            
                    </table>
                    <div class="text-right">
                        {!! $visitors->render() !!}
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>

@endsection