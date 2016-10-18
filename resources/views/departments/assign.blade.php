@extends('layouts.master')
@section('title', 'Lista departamentos')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-mini">')
@section('content-wrapper')

<section class="content-header">
    <h1>DEPARTAMENTOS</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-building-o"></i>

                <h3 class="box-title">Departamentos</h3>
            </div>
            <div class="box-body pad table-responsive">
                @foreach($departments as $department)
                    @if($department->own == 1)
                        <?php $disabled = 'disabled';  $assign = 'Asignado' ?>
                    @else
                        <?php $disabled = ''; $assign = 'Asignar'?>
                    @endif
                    @if($department->floor == 1 || $department->floor == 9)
                        <?php $color = 'bg-aqua'; $colorButton = 'btn-info'; ?>
                    @elseif($department->floor == 2 || $department->floor == 10)
                        <?php $color = 'bg-green'; $colorButton = 'btn-success'; ?>
                    @elseif($department->floor == 3 || $department->floor == 11)
                        <?php $color = 'bg-yellow'; $colorButton = 'btn-warning'; ?>
                    @elseif($department->floor == 4 || $department->floor == 12)
                        <?php $color = 'bg-red'; $colorButton = 'btn-danger'; ?>
                    @elseif($department->floor == 5 || $department->floor == 13)
                        <?php $color = 'bg-aqua'; $colorButton = 'btn-info'; ?>
                    @elseif($department->floor == 6 || $department->floor == 14)
                        <?php $color = 'bg-green'; $colorButton = 'btn-success'; ?>
                    @elseif($department->floor == 7 || $department->floor == 15)
                        <?php $color = 'bg-yellow'; $colorButton = 'btn-warning'; ?>
                    @elseif($department->floor == 8 || $department->floor == 16)
                        <?php $color = 'bg-red'; $colorButton = 'btn-danger'; ?>
                    @else
                        <?php $color = 'bg-aqua'; $colorButton = 'btn-info'; ?>
                    @endif
                    <div class="col-lg-2 col-xs-6">
                        <!-- small box -->
                        <div class="small-box {{ $color }}">
                            <div class="inner">
                                <h4>{{ $department->name. '('. $department->code . ')' }}</h4>
                            </div>
                            <a href="{{ route('departments.storeAssign', [$owner_id, $department->id]) }}" class="btn btn-block  {{ $colorButton. ' ' . $disabled }}" onclick="return confirm('¿Seguro que deseas asignarlo?')" >{{ $assign }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.col -->
</div>


@endsection