@extends('layouts.master')
@section('title', 'Lista planificacion anual')
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
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('annualEstimations.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nueva planificaci&oacute;n anual</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Planificaci&oacute;n</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($annual_estimations as $annual_estimation)
                            <tr>
                                <td>{{ $annual_estimation->name . ' ' .  $annual_estimation->annual_year }}</td>
                                <td>
                                @if($annual_estimation->status == 'Activo')
                                    <span class="label label-success">{{ $annual_estimation->status }}</span>
                                @else
                                    <span class="label label-warning">{{ $annual_estimation->status }}</span>
                                @endif
                                </td>
                                <td>
                                    <a href="{{ route('activities.view', $annual_estimation->id) }}" title="Ver planificaci&oacute;n"><span class="label label-success"><i class="fa fa-list-alt"></i></span></a>
                                    <a href="{{ route('annualEstimations.edit', $annual_estimation->id) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="#" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>                        
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    {!! $annual_estimations->render() !!}
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>


@endsection