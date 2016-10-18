@extends('layouts.master')
@section('title', 'Lista Areas comunes')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="active treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@section('content-wrapper')

<section class="content-header">
    <h1>
        AREAS COMUNES
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('commonAreas.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nuevo &aacute;rea com&uacute;n</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Area com&uacute;n</th>
                                <th>C&oacute;digo</th>
                                <th>Precio uno</th>
                                <th>Precio Dos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commonAreas as $commonArea)
                            <tr>
                                <td>{{ $commonArea->name }}</td>
                                <td>{{ $commonArea->code }}</td>
                                <td>{{ $commonArea->price_one }}</td>
                                <td>{{ $commonArea->price_two }}</td>
                                <td>                     
                                    <a href="{{ route('commonAreas.edit', $commonArea->id) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('commonAreas.destroy', $commonArea->id) }}" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>                        
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>

@endsection