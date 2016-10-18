@extends('layouts.master')
@section('title', 'Lista departamentos')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('menu_treeview_one', '<li class="active treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="treeview">')

@section('content-wrapper')

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        @foreach($dashboard_departments as $department)        

        @if($department->floor == 1 || $department->floor == 5 || $department->floor == 9 )
        <?php $colorbg = 'bg-aqua'; ?>
        @elseif($department->floor == 2 || $department->floor == 6 || $department->floor == 10)
        <?php $colorbg = 'bg-green'; ?>
        @elseif($department->floor == 3 || $department->floor == 7 || $department->floor == 11)
        <?php $colorbg = 'bg-yellow'; ?>
        @elseif($department->floor == 4 || $department->floor == 8 || $department->floor == 12)
        <?php $colorbg = 'bg-red'; ?>
        @else
        <?php $colorbg = 'bg-aqua'; ?>
        @endif

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box {{ $colorbg }}">
                <div class="inner">
                    <h3>{{ $department->name}}</h3>
                    <p>C&oacute;digo: {{ $department->code }}<br>
                        @if($department->first_name != '')
                        {{ $department->last_name }}<br> 
                        {{ $department->first_name }} 
                        @else
                        No<br> 
                        asignado
                        @endif
                    </p>
                </div>
                <div class="icon">
                    <i class="fa fa-building-o"></i>
                </div>
                <a href="#" title="Ver" name ="show_user" data-toggle ="modal" data-target ="#myModal" onclick="showDepartment({{ $department->department_id }});"  class="small-box-footer">M&aacute;s informaci&oacute;n <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endforeach

        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- /.row (main row) -->

</section>

@include('includes.model_content_dashboard')

@endsection


@section('script_content')

<script>
    
    function showDepartment(id){
        var department_id = id;
        var route = '{{ route('dashboard.show', 'id')}}';
        route = route.replace('id', department_id);
        $.get(route, function(department){
//            console.log(user);
            document.getElementById('name_department').innerHTML = department.name + ' (Piso: ' + department.floor + ')';
            document.getElementById('code_department').innerHTML = department.code;
            document.getElementById('category_department').innerHTML = department.category + ' (' + department.area_m2 + ' m2)';
            if(department.first_name === null){
                document.getElementById('name_owner').innerHTML = 'No asignado';
                document.getElementById('number_people_owner').innerHTML = '';
                document.getElementById('address_owner').innerHTML = department.address;
                document.getElementById('phone_owner').innerHTML = department.cell_phone;
                document.getElementById('email_owner').innerHTML = department.email;
            }
            else{
                document.getElementById('name_owner').innerHTML = department.first_name + ' ' + department.last_name + ' (CI: ' + department.ci + ')';
                document.getElementById('number_people_owner').innerHTML = department.number_people;
                document.getElementById('address_owner').innerHTML = department.address;
                document.getElementById('phone_owner').innerHTML = 'Casa: ' +department.phone_house + '  Oficina: ' + department.phone_house + '  Cel: ' + department.cell_phone;
                document.getElementById('email_owner').innerHTML = department.email;
            };
        });
    }
//
    $(document).ready(function () {
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus();
        });
    });

</script>

@endsection
