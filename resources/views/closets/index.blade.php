@extends('layouts.master')
@section('title', 'Lista bauleras')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="active treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>
        ZONA DE BAULERA: {{ $place_closet->name }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('placeClosets.index') }}">Zona de bauleras</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('closets.create', $place_closet_id) }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nueva baulera</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Baulera</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($closets as $closet)
                            <tr>
                                <td>{{ $closet->name }}</td>
                                <td>                     
                                    <a href="{{ route('closets.edit', [$place_closet_id, $closet->id]) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('closets.destroy', [$place_closet_id, $closet->id]) }}" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>                        
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    {!! $closets->render() !!}
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>

@endsection