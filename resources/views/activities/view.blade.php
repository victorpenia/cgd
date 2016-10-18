@extends('layouts.master')
@section('title', 'Lista planificacion anual')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="active treeview">')
@section('content-wrapper')


<section class="content-header">
    <h1>
        PLANIFICACION ANUAL {{ $annual_estimation->annual_year }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('annualEstimations.index') }}"> Planificaci&oacute;n anual</a></li>
    </ol>
</section>
<section class="content-header">
    <h3>
        Ingresos Ordinarios
    </h3>
    <ol class="breadcrumb">
        <a href="{{ route('paymentsAjax.index', $annual_estimation->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Editar planificaci&oacute;n anual (Ingresos)</a>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableOne">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Anual</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 97%;">
                            @foreach($payments as $payment)
                            @if($payment->type == 1)
                            <tr>
                                <td>{{ $payment->name }}</td>
                                <td>{{ $payment->annual }}</td>
                                <td>{{ $payment->january }}</td>
                                <td>{{ $payment->february }}</td>
                                <td>{{ $payment->march }}</td>
                                <td>{{ $payment->april }}</td>
                                <td>{{ $payment->may }}</td>
                                <td>{{ $payment->june }}</td>
                                <td>{{ $payment->july }}</td>
                                <td>{{ $payment->august }}</td>
                                <td>{{ $payment->september }}</td>
                                <td>{{ $payment->octuber }}</td>
                                <td>{{ $payment->november }}</td>
                                <td>{{ $payment->december }}</td>
                            </tr> 
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot style="font-size: 97%;">
                            <tr>
                                <th><strong>TOTAL</strong></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr></thead>
                        </tfoot> 
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <h3>
        Ingresos Extraordinarios
    </h3>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableTwo">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Anual</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 97%;">
                            @foreach($payments as $payment)
                            @if($payment->type == 2)
                            <tr>
                                <td>{{ $payment->name }}</td>
                                <td>{{ $payment->annual }}</td>
                                <td>{{ $payment->january }}</td>
                                <td>{{ $payment->february }}</td>
                                <td>{{ $payment->march }}</td>
                                <td>{{ $payment->april }}</td>
                                <td>{{ $payment->may }}</td>
                                <td>{{ $payment->june }}</td>
                                <td>{{ $payment->july }}</td>
                                <td>{{ $payment->august }}</td>
                                <td>{{ $payment->september }}</td>
                                <td>{{ $payment->octuber }}</td>
                                <td>{{ $payment->november }}</td>
                                <td>{{ $payment->december }}</td>
                            </tr> 
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot style="font-size: 97%;">
                            <tr>
                                <th><strong>TOTAL</strong></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr></thead>
                        </tfoot> 
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <h3>
        Gastos Ordinarios
    </h3>
    <ol class="breadcrumb">
        <a href="{{ route('expensesAjax.index', $annual_estimation->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Editar planificaci&oacute;n anual (Gastos)</a>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableThree">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Anual</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 97%;">
                            @foreach($expenses as $expense)
                            @if($expense->type == 1)
                            <tr>
                                <td>{{ $expense->name }}</td>
                                <td>{{ $expense->annual }}</td>
                                <td>{{ $expense->january }}</td>
                                <td>{{ $expense->february }}</td>
                                <td>{{ $expense->march }}</td>
                                <td>{{ $expense->april }}</td>
                                <td>{{ $expense->may }}</td>
                                <td>{{ $expense->june }}</td>
                                <td>{{ $expense->july }}</td>
                                <td>{{ $expense->august }}</td>
                                <td>{{ $expense->september }}</td>
                                <td>{{ $expense->octuber }}</td>
                                <td>{{ $expense->november }}</td>
                                <td>{{ $expense->december }}</td>
                            </tr> 
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot style="font-size: 97%;">
                            <tr>
                                <th><strong>TOTAL</strong></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr></thead>
                        </tfoot> 
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
<section class="content-header">
    <h3>
        Gastos Extraordinarios
    </h3>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableFour">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Anual</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 97%;">
                            @foreach($expenses as $expense)
                            @if($expense->type == 2)
                            <tr>
                                <td>{{ $expense->name }}</td>
                                <td>{{ $expense->annual }}</td>
                                <td>{{ $expense->january }}</td>
                                <td>{{ $expense->february }}</td>
                                <td>{{ $expense->march }}</td>
                                <td>{{ $expense->april }}</td>
                                <td>{{ $expense->may }}</td>
                                <td>{{ $expense->june }}</td>
                                <td>{{ $expense->july }}</td>
                                <td>{{ $expense->august }}</td>
                                <td>{{ $expense->september }}</td>
                                <td>{{ $expense->octuber }}</td>
                                <td>{{ $expense->november }}</td>
                                <td>{{ $expense->december }}</td>
                            </tr> 
                            @endif
                            @endforeach
                        </tbody>
                        <tfoot style="font-size: 97%;">
                            <tr>
                                <th><strong>TOTAL</strong></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr></thead>
                        </tfoot> 
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>

<?php 
$total_payment_department = 0;
$total_payment_net = 0;
$total_january_net = 0;
$total_february_net = 0;
$total_march_net = 0;
$total_april_net = 0;
$total_may_net = 0;
$total_june_net = 0;
$total_july_net = 0;
$total_august_net = 0;
$total_september_net = 0;
$total_octuber_net = 0;
$total_november_net = 0;
$total_december_net = 0;
?>

<section class="content-header">
    <h3>
        Totales
    </h3>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableFour">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Anual</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 97%;">
                            @foreach($annual_payments as $annual_payment)
                            <?php
                            $total_payment_department += $annual_payment->total_payment;
                            $total_payment_net += $annual_payment->total_payment;
                            $total_january_net += $annual_payment->total_january;
                            $total_february_net += $annual_payment->total_february;
                            $total_march_net += $annual_payment->total_march;
                            $total_april_net += $annual_payment->total_april;
                            $total_may_net += $annual_payment->total_may;
                            $total_june_net += $annual_payment->total_june;
                            $total_july_net += $annual_payment->total_july;
                            $total_august_net += $annual_payment->total_august;
                            $total_september_net += $annual_payment->total_september;
                            $total_octuber_net += $annual_payment->total_octuber;
                            $total_november_net += $annual_payment->total_november;
                            $total_december_net += $annual_payment->total_december;
                            ?>
                            <tr>
                                <td>Ingresos totales</td>
                                <td>{{ $annual_payment->total_payment }}</td>
                                <td>{{ $annual_payment->total_january }}</td>
                                <td>{{ $annual_payment->total_february }}</td>
                                <td>{{ $annual_payment->total_march }}</td>
                                <td>{{ $annual_payment->total_april }}</td>
                                <td>{{ $annual_payment->total_may }}</td>
                                <td>{{ $annual_payment->total_june }}</td>
                                <td>{{ $annual_payment->total_july }}</td>
                                <td>{{ $annual_payment->total_august }}</td>
                                <td>{{ $annual_payment->total_september }}</td>
                                <td>{{ $annual_payment->total_octuber }}</td>
                                <td>{{ $annual_payment->total_november }}</td>
                                <td>{{ $annual_payment->total_december }}</td>
                            </tr>
                            @endforeach
                            @foreach($annual_expenses as $annual_expense)
                            <?php
                            $total_payment_net = $total_payment_net - $annual_expense->total_expense;
                            $total_january_net = $total_january_net - $annual_expense->total_january;
                            $total_february_net = $total_february_net - $annual_expense->total_february;
                            $total_march_net = $total_march_net - $annual_expense->total_march;
                            $total_april_net = $total_april_net - $annual_expense->total_april;
                            $total_may_net = $total_may_net - $annual_expense->total_may;
                            $total_june_net = $total_june_net - $annual_expense->total_june;
                            $total_july_net = $total_july_net - $annual_expense->total_july;
                            $total_august_net = $total_august_net - $annual_expense->total_august;
                            $total_september_net = $total_september_net - $annual_expense->total_september;
                            $total_octuber_net = $total_octuber_net - $annual_expense->total_octuber;
                            $total_november_net = $total_november_net - $annual_expense->total_november;
                            $total_december_net = $total_december_net - $annual_expense->total_december;
                            ?>
                            <tr>
                                <td>Gastos totales</td>
                                <td>{{ $annual_expense->total_expense }}</td>
                                <td>{{ $annual_expense->total_january }}</td>
                                <td>{{ $annual_expense->total_february }}</td>
                                <td>{{ $annual_expense->total_march }}</td>
                                <td>{{ $annual_expense->total_april }}</td>
                                <td>{{ $annual_expense->total_may }}</td>
                                <td>{{ $annual_expense->total_june }}</td>
                                <td>{{ $annual_expense->total_july }}</td>
                                <td>{{ $annual_expense->total_august }}</td>
                                <td>{{ $annual_expense->total_september }}</td>
                                <td>{{ $annual_expense->total_octuber }}</td>
                                <td>{{ $annual_expense->total_november }}</td>
                                <td>{{ $annual_expense->total_december }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Recurso Neto</td>
                                <td>{{ $total_payment_net }}</td>
                                <td>{{ $total_january_net }}</td>
                                <td>{{ $total_february_net }}</td>
                                <td>{{ $total_march_net }}</td>
                                <td>{{ $total_april_net }}</td>
                                <td>{{ $total_may_net }}</td>
                                <td>{{ $total_june_net }}</td>
                                <td>{{ $total_july_net }}</td>
                                <td>{{ $total_august_net }}</td>
                                <td>{{ $total_september_net }}</td>
                                <td>{{ $total_octuber_net }}</td>
                                <td>{{ $total_november_net }}</td>
                                <td>{{ $total_december_net }}</td>
                            </tr>
                        </tbody> 
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
<?php 
//Calculo de cuotas por departamento
//1.- Por departamento.
$total_annual_department = $total_payment_department/27;
$total_month_department = ($total_payment_department/27)/12;


?>

<section class="content-header">
    <h3>
        Totales por departamento
    </h3>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableFour">
                        <thead>
                            <tr>
                                <th>Departamento</th>
                                <th>Código</th>
                                <th>Anual</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 97%;">
                            @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->code }}</td>
                                <td>{{ number_format((float)$total_annual_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
                                <td>{{ number_format((float)$total_month_department, 2, '.', '') }}</td>
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

<section class="content-header">
</section>


@endsection

@section('script_content')

<script src="{{ asset('editabletable/numeric-input-example.js')}}"></script>

<script>

 $(document).ready(function(){    
    $('#mainTableOne').numericInputExample();
    $('#mainTableTwo').numericInputExample();
    $('#mainTableThree').numericInputExample();
    $('#mainTableFour').numericInputExample();
 });


</script>

@endsection