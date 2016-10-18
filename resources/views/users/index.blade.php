@extends('layouts.master')
@section('title', 'Lista usuarios')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="active treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="treeview">')
@include('includes.model_content_user')
@section('content-wrapper')

<section class="content-header">
    <h1>USUARIOS</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Crear nuevo usuario</a>
                </div>
                {!! Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                <div class="form-group">
                    {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                </div>
                {!! Form::close() !!}
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Celular</th>
                                <th>Correo electr&oacute;nico</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->cell_phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role_id == 1)
                                    <span class="label label-primary">{{ $user->role->name }}</span>
                                    @elseif($user->role_id == 2)
                                    <span class="label label-success">{{ $user->role->name }}</span>
                                    @elseif($user->role_id == 3)
                                    <span class="label label-info">{{ $user->role->name }}</span>
                                    @else
                                    <span class="label label-warning">{{ $user->role->name }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" title="Ver" name ="show_user" data-toggle ="modal" data-target ="#myModal" onclick="showUser({{ $user->id }});"><span class="label label-primary"><i class="fa fa-eye"></i></span></a>                        
                                    <a href="{{ route('users.edit', $user->id) }}" title="Editar"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                                    <a href="{{ route('users.destroy', $user->id) }}" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminarlo?')"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>            
                    </table>
                    <div class="text-right">
                        {!! $users->render() !!}
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
    
    function showUser(id){
        var user_id = id;
        var route = '{{ route('users.show', 'id')}}';
        route = route.replace('id', user_id);
        $.get(route, function(user){
//            console.log(user);
            document.getElementById('name_user').innerHTML = user.first_name + ' ' + user.last_name;
            document.getElementById('address_user').innerHTML = user.address;
            document.getElementById('phone_user').innerHTML = user.phone;
            document.getElementById('cell_phone_user').innerHTML = user.cell_phone;
            document.getElementById('status_user').innerHTML = user.status;
            document.getElementById('email_user').innerHTML = user.email;
            document.getElementById('role_user').innerHTML = user.name;
        });
    }
    
  $(document).ready(function(){
      
      $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus();
      });
    });  
  
</script>

@endSection