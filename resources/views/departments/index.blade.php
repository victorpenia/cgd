@extends('layouts.master')
@section('title', 'Lista departamentos')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="active treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@include('includes.model_content_department')
@section('content-wrapper')

<section class="content-header">
    <h1>DEPARTAMENTOS</h1>
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
                    <a href="{{ route('departments.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nuevo departamento</a>
                </div>
                {!! Form::open(['route' => 'departments.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                <div class="form-group">
                    {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                </div>
                {!! Form::close() !!}
                <!--/.box-header--> 
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>C&oacute;digo</th>
                                <th>Departamento</th>
                                <th>Bloque</th>
                                <th>Categoria</th>
                                <th>Superficie M2</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->code }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->block_name }}</td>
                                <td>{{ $department->category }}</td>
                                <td>{{ $department->area_m2 }}</td>
                                <td>
                                    <a href="#" title="Ver" name ="show_department" data-toggle ="modal" data-target ="#myModal" onclick="showDepartment({{ $department->id }});"><span class="label label-primary"><i class="fa fa-eye"></i></span></a>                        
                                    <a href="{{ route('departments.edit', $department->id) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('departments.destroy', $department->id) }}" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>            
                    </table>
                    <div class="text-right">
                        {!! $departments->render() !!}
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>


@endsection


@section('script_content')

<script>
    
    function showDepartment(id){
        var department_id = id;
        var route = '{{ route('departments.show', 'id')}}';
        route = route.replace('id', department_id);
        $.get(route, function(department){
//            console.log(department);
            document.getElementById('name_department').innerHTML = department.name;
            document.getElementById('code_department').innerHTML = department.code;
            document.getElementById('floor_department').innerHTML = department.floor;
            document.getElementById('category_department').innerHTML = department.category;
            document.getElementById('area_m2_department').innerHTML = department.area_m2;
            document.getElementById('own_department').innerHTML = department.own;
            document.getElementById('status_user').innerHTML = department.status;
            document.getElementById('description_user').innerHTML = department.description;
        });
    }
    
  $(document).ready(function(){      
      $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus();
      });
    });  
  
</script>

@endSection