@extends('layouts.master')
@section('title', 'Lista planificacion anual')
@section('body_toggle', '<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">')
@section('menu_treeview_one', '<li class="treeview">') 
@section('menu_treeview_two', '<li class="treeview">')
@section('menu_treeview_three', '<li class="treeview">')
@section('menu_treeview_four', '<li class="active treeview">')
@section('content-wrapper')
@include('includes.model_content_annual_estimation')

<section class="content-header">
    <h1>
        PLANIFICACION ANUAL {{ $annual_estimation->annual_year }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
    <form>
        <!--hidden -->
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        </div>
    </form>
</section>

<section class="content-header">
    <h1>
        Ingresos Ordinarios 
    </h1>
    <ol class="breadcrumb">
        <a href="{{ route('activities.view', $annual_estimation_id) }}" class="btn btn-success"><i class="fa fa-check"></i> Guardar cambios y calcular presupuesto</a>
    </ol>
</section><br>

<!--<section class="content">-->
    <div class="row">
        <div class="col-md-12">
            <div class="box">    
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableOne">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Presupuesto</th>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="dataOne" style="font-size: 90%;">
                            
                        </tbody>
                        <tfoot style="font-size: 90%;">
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
                                <th></th>
                            </tr></thead>
                        </tfoot>    
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="row no-print">
            <div class="col-xs-12">
                <!--<a href="#" class="btn btn-success pull-right" id ="create_activity" name ="create_activity" data-toggle ="modal" data-target ="#myModal" value ="{{ $annual_estimation_id }}" onclick="ShowFormActivity(this)" > Nueva actividad</a>-->
                {!! Form::button('Nuevo Concepto', ['class' => 'btn btn-success pull-right', 'id' => 'create_activity_one', 'value' => $annual_estimation_id, 'name' => 'create_activity_one', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
<!--                <button id="create_activity" name='create_activity' type="button" class="btn btn-success pull-right" value="{{ $annual_estimation_id }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Nueva actividad
                </button>-->
            </div>
            </div>
        </div>
    </div>
<!--</section>-->

<section class="content-header">
    <h1>
        Ingresos Extraordinarios 
        <!--<a href="#" class="btn btn-success"><i class="fa fa-edit"></i> Editar Presupuesto</a>-->
    </h1>
</section><br>

<!--<section class="content">-->
    <div class="row">
        <div class="col-md-12">
            <div class="box">    
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableTwo">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Presupuesto</th>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="dataTwo" style="font-size: 90%;">
                            
                        </tbody>
                        <tfoot style="font-size: 90%;">
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
                                <th></th>
                            </tr></thead>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="row no-print">
            <div class="col-xs-12">
                <!--<a href="#" class="btn btn-success pull-right" id ="create_activity" name ="create_activity" data-toggle ="modal" data-target ="#myModal" value ="{{ $annual_estimation_id }}" onclick="ShowFormActivity(this)" > Nueva actividad</a>-->
                {!! Form::button('Nuevo Concepto', ['class' => 'btn btn-success pull-right', 'id' => 'create_activity_two', 'value' => $annual_estimation_id, 'name' => 'create_activity_two', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
<!--                <button id="create_activity" name='create_activity' type="button" class="btn btn-success pull-right" value="{{ $annual_estimation_id }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Nueva actividad
                </button>-->
            </div>
            </div>
        </div>
    </div>
<!--</section>-->

<section class="content-header">
    <h1>
        Gastos Ordinarios 
        <!--<a href="#" class="btn btn-success"><i class="fa fa-edit"></i> Editar Presupuesto</a>-->
    </h1>
</section><br>

<!--<section class="content">-->
    <div class="row">
        <div class="col-md-12">
            <div class="box">    
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableThree">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Presupuesto</th>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="dataThree" style="font-size: 90%;">
                            
                        </tbody>
                        <tfoot style="font-size: 90%;">
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
                                <th></th>
                            </tr></thead>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="row no-print">
            <div class="col-xs-12">
                <!--<a href="#" class="btn btn-success pull-right" id ="create_activity" name ="create_activity" data-toggle ="modal" data-target ="#myModal" value ="{{ $annual_estimation_id }}" onclick="ShowFormActivity(this)" > Nueva actividad</a>-->
                {!! Form::button('Nuevo Concepto', ['class' => 'btn btn-success pull-right', 'id' => 'create_activity_three', 'value' => $annual_estimation_id, 'name' => 'create_activity_three', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
<!--                <button id="create_activity" name='create_activity' type="button" class="btn btn-success pull-right" value="{{ $annual_estimation_id }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Nueva actividad
                </button>-->
            </div>
            </div>
        </div>
    </div>
<!--</section>-->

<section class="content-header">
    <h1>
        Gastos Extraordinarios 
        <!--<a href="#" class="btn btn-success"><i class="fa fa-edit"></i> Editar Presupuesto</a>-->
    </h1>
</section><br>

<!--<section class="content">-->
    <div class="row">
        <div class="col-md-12">
            <div class="box">    
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="mainTableFour">
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Presupuesto</th>
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
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="dataFour" style="font-size: 90%;">
                            
                        </tbody>
                        <tfoot style="font-size: 90%;">
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
                                <th></th>
                            </tr></thead>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="row no-print">
            <div class="col-xs-12">
                <!--<a href="#" class="btn btn-success pull-right" id ="create_activity" name ="create_activity" data-toggle ="modal" data-target ="#myModal" value ="{{ $annual_estimation_id }}" onclick="ShowFormActivity(this)" > Nueva actividad</a>-->
                {!! Form::button('Nuevo Concepto', ['class' => 'btn btn-success pull-right', 'id' => 'create_activity_four', 'value' => $annual_estimation_id, 'name' => 'create_activity_four', 'data-toggle' => 'modal', 'data-target' => '#myModal']) !!}
<!--                <button id="create_activity" name='create_activity' type="button" class="btn btn-success pull-right" value="{{ $annual_estimation_id }}" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle"></i> Nueva actividad
                </button>-->
            </div>
            </div>
        </div>
    </div>
<!--</section>-->


@endsection


@section('script_content')



<script>
  
  $(document).ready(function(){
      loadData();
      
      $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus();
      });
      
//      $('#myModal').on('hidden.bs.modal', function () {
//           $(this).find("input").val('').end();
//      });
      
      $('#create_activity_one').click(function(){
          var annual_estimation_id = $(this).val();
          var route = '{{ route('activities.create', 'annual_estimation_id')}}';
          $.get(route, function(){
              $('#annual_estate_id').val();
              $('#type').val(1);
          });
      });
      
      $('#create_activity_two').click(function(){
          var annual_estimation_id = $(this).val();
          var route = '{{ route('activities.create', 'annual_estimation_id')}}';
          $.get(route, function(){
              $('#annual_estate_id').val();
              $('#type').val(2);
          });
      });
      
      $('#create_activity_three').click(function(){
          var annual_estimation_id = $(this).val();
          var route = '{{ route('activities.create', 'annual_estimation_id')}}';
          $.get(route, function(){
              $('#annual_estate_id').val();
              $('#type').val(3);
          });
      });
      
      $('#create_activity_four').click(function(){
          var annual_estimation_id = $(this).val();
          var route = '{{ route('activities.create', 'annual_estimation_id')}}';
          $.get(route, function(){
              $('#annual_estate_id').val();
              $('#type').val(4);
          });
      });
      
      $('#store_activity').click(function(){
          var annual_estimation_id = $('#annual_estimation_id').val();
          var name = $('#name').val();
          var type = $('#type').val();
          var annual_estate = $('#annual_estate').val();
          var token = $('#token').val();
          var route = '{{ route('activities.store')}}';
          var data = {name: name, annual_estate: annual_estate, type: type, annual_estimation_id: annual_estimation_id}
          $.ajax({
              url: route,
              headers: {'X-CSRF-TOKEN': token},
              type: 'POST',
              dataType: 'JSON',
              data: data,
              success: function(){
                  $('#myModal').modal('toggle');
                  loadData();
//                  $('#myModal').find("input").val('').end();
              },
              error:function(data){
                if(typeof data.responseJSON.name === 'undefined' ){
                    errorsHtml = '<span class="help-block" style="color:#dd4b39"><strong></strong></span>' ;                
                    $( '#error_data_one' ).html(errorsHtml);
                }else
                {
                    errorsHtml = '<span class="help-block" style="color:#dd4b39"><strong>'+ data.responseJSON.name +'</strong></span>' ;                
                    $( '#error_data_one' ).html(errorsHtml);
                }
                if(typeof data.responseJSON.annual_estate === 'undefined' ){
                    errorsHtml = '<span class="help-block" style="color:#dd4b39"><strong></strong></span>' ;                
                    $( '#error_data_two' ).html(errorsHtml);
                }else
                {
                    errorsHtml = '<span class="help-block" style="color:#dd4b39"><strong>'+ data.responseJSON.annual_estate +'</strong></span>' ;                
                    $( '#error_data_two' ).html(errorsHtml);
                }
              }
          });
      });
      

  });

function loadData()
{
      var tableDataOne = $("#dataOne");
      $("#dataOne").empty();
      var tableDataTwo = $("#dataTwo");
      $("#dataTwo").empty();
      var tableDataThree = $("#dataThree");
      $("#dataThree").empty();
      var tableDataFour = $("#dataFour");
      $("#dataFour").empty();
      var annual_estimation_id = {{ $annual_estimation_id }};
      var route = '{{ route('activities.listing', 'id')}}';
      var countOne = 0;
      var countTwo = 0;
      var countThree = 0;
      var countFour = 0;
      route = route.replace('id', annual_estimation_id);
      $.get(route, function(data){
          $(data).each(function(key, value){
              
              if(value.type === 1){
                tableDataOne.append('<tr><td>'+ value.name +'</td><td>'+ value.annual_estate +'</td><td>'+ value.january  +'</td><td>'+ value.february +'</td><td>'+ value.march +'</td><td>'+ value.april +'</td><td>'+ value.may +'</td><td>'+ value.june +'</td><td>'+ value.july +'</td><td>'+ value.august +'</td><td>'+ value.september +'</td><td>'+ value.octuber +'</td><td>'+ value.november +'</td><td>'+ value.december +'</td><th><button class="btn btn-link btn-xs" value="' + value.activity_id + '" onclick= "UpdateActivityOne(this, '+ countOne +')" title="Guardar cambios" ><span class="label label-success"><i class="fa fa-check"></i></span></button><button class="btn btn-link btn-xs" value="' + value.activity_id + '" onclick= "DeleteActivityOne(this)" title="Eliminar concepto"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></button></th></tr>');
                countOne++;
              }
              if(value.type === 2){
                tableDataTwo.append('<tr><td>'+ value.name +'</td><td>'+ value.annual_estate +'</td><td>'+ value.january  +'</td><td>'+ value.february +'</td><td>'+ value.march +'</td><td>'+ value.april +'</td><td>'+ value.may +'</td><td>'+ value.june +'</td><td>'+ value.july +'</td><td>'+ value.august +'</td><td>'+ value.september +'</td><td>'+ value.octuber +'</td><td>'+ value.november +'</td><td>'+ value.december +'</td><th><button class="btn btn-link btn-xs" value="' + value.activity_id + '" onclick= "UpdateActivityTwo(this, '+ countTwo +')" title="Guardar cambios"><span class="label label-success"><i class="fa fa-check"></i></span></button><button class="btn btn-link btn-xs" value="' + value.activity_id + '" onclick= "DeleteActivityOne(this)" title="Eliminar concepto"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></button></th></tr>');
                countTwo++;
              }
              if(value.type === 3){
                tableDataThree.append('<tr><td>'+ value.name +'</td><td>'+ value.annual_estate +'</td><td>'+ value.january  +'</td><td>'+ value.february +'</td><td>'+ value.march +'</td><td>'+ value.april +'</td><td>'+ value.may +'</td><td>'+ value.june +'</td><td>'+ value.july +'</td><td>'+ value.august +'</td><td>'+ value.september +'</td><td>'+ value.octuber +'</td><td>'+ value.november +'</td><td>'+ value.december +'</td><th><button class="btn btn-link btn-xs" value="' + value.activity_id + '" onclick= "UpdateActivityThree(this, '+ countThree +')" title="Guardar cambios"><span class="label label-success"><i class="fa fa-check"></i></span></button><button class="btn btn-link btn-xs" value="' + value.activity_id + '" onclick= "DeleteActivityOne(this)" title="Eliminar concepto"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></button></th></tr>');
                countThree++;
              }
              if(value.type === 4){
                tableDataFour.append('<tr><td>'+ value.name +'</td><td>'+ value.annual_estate +'</td><td>'+ value.january  +'</td><td>'+ value.february +'</td><td>'+ value.march +'</td><td>'+ value.april +'</td><td>'+ value.may +'</td><td>'+ value.june +'</td><td>'+ value.july +'</td><td>'+ value.august +'</td><td>'+ value.september +'</td><td>'+ value.octuber +'</td><td>'+ value.november +'</td><td>'+ value.december +'</td><th><button class="btn btn-link btn-xs" value="' + value.activity_id + '" onclick= "UpdateActivityFour(this, '+ countFour +')" title="Guardar cambios"><span class="label label-success"><i class="fa fa-check"></i></span></button><button class="btn btn-link btn-xs" value="' + value.activity_id + '" onclick= "DeleteActivityOne(this)" title="Eliminar concepto"><span class="label label-danger"><i class="fa fa-trash-o"></i></span></button></th></tr>');
                countFour++;
              }
              
              $('#mainTableTwo').editableTableWidget().numericInputExample();
            //  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
              window.prettyPrint && prettyPrint();
              
              $('#mainTableOne').editableTableWidget().numericInputExample();
            //  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
              window.prettyPrint && prettyPrint();
              
              $('#mainTableThree').editableTableWidget().numericInputExample();
            //  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
              window.prettyPrint && prettyPrint();
              
              $('#mainTableFour').editableTableWidget().numericInputExample();
            //  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
              window.prettyPrint && prettyPrint();
              
          });
      });
}
  
    
function UpdateActivityOne(btn, count)
{
//    console.log('id '+ btn.value);
//    console.log('count '+ count);
    var activity_id = btn.value;
    var annual_estimation_id = {{ $annual_estimation_id }};
    var name, annual_estate, january, february, march, april, may,
        june, july, august, september, octuber, november, december;
    $('#mainTableOne tbody tr').each(function() {
        var row = $(this);
        if(row.index() === count){
            name = row.children().eq(0).text();
            annual_estate = row.children().eq(1).text();
            january = row.children().eq(2).text();
            february = row.children().eq(3).text();
            march = row.children().eq(4).text();
            april = row.children().eq(5).text();
            may = row.children().eq(6).text();
            june = row.children().eq(7).text();
            july = row.children().eq(8).text();
            august = row.children().eq(9).text();
            september = row.children().eq(10).text();
            octuber = row.children().eq(11).text();
            november = row.children().eq(12).text();
            december = row.children().eq(13).text();
        }
    });
    
    var data = {name: name, annual_estate: annual_estate, annual_estimation_id:annual_estimation_id, january: january, february: february, march: march, april: april, may: may, june: june, july: july, august: august, september: september, octuber: octuber, november:november, december: december};
    var token = $('#token').val();
    var route = '{{ route('activities.update', 'id')}}';
    route = route.replace('id', activity_id);
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'JSON',
        data: data,
        success: function(){
            loadData();
        },
    });
};

function UpdateActivityTwo(btn, count)
{
//    console.log('id '+ btn.value);
//    console.log('count '+ count);
    var activity_id = btn.value;
    var annual_estimation_id = {{ $annual_estimation_id }};
    var name, annual_estate, january, february, march, april, may,
        june, july, august, september, octuber, november, december;
    $('#mainTableTwo tbody tr').each(function() {
        var row = $(this);
        if(row.index() === count){
            name = row.children().eq(0).text();
            annual_estate = row.children().eq(1).text();
            january = row.children().eq(2).text();
            february = row.children().eq(3).text();
            march = row.children().eq(4).text();
            april = row.children().eq(5).text();
            may = row.children().eq(6).text();
            june = row.children().eq(7).text();
            july = row.children().eq(8).text();
            august = row.children().eq(9).text();
            september = row.children().eq(10).text();
            octuber = row.children().eq(11).text();
            november = row.children().eq(12).text();
            december = row.children().eq(13).text();
        }
    });
    
    var data = {name: name, annual_estate: annual_estate, annual_estimation_id:annual_estimation_id, january: january, february: february, march: march, april: april, may: may, june: june, july: july, august: august, september: september, octuber: octuber, november:november, december: december};
    var token = $('#token').val();
    var route = '{{ route('activities.update', 'id')}}';
    route = route.replace('id', activity_id);
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'JSON',
        data: data,
        success: function(){
            loadData();
        },
    });
};

function UpdateActivityThree(btn, count)
{
//    console.log('id '+ btn.value);
//    console.log('count '+ count);
    var activity_id = btn.value;
    var annual_estimation_id = {{ $annual_estimation_id }};
    var name, annual_estate, january, february, march, april, may,
        june, july, august, september, octuber, november, december;
    $('#mainTableThree tbody tr').each(function() {
        var row = $(this);
        if(row.index() === count){
            name = row.children().eq(0).text();
            annual_estate = row.children().eq(1).text();
            january = row.children().eq(2).text();
            february = row.children().eq(3).text();
            march = row.children().eq(4).text();
            april = row.children().eq(5).text();
            may = row.children().eq(6).text();
            june = row.children().eq(7).text();
            july = row.children().eq(8).text();
            august = row.children().eq(9).text();
            september = row.children().eq(10).text();
            octuber = row.children().eq(11).text();
            november = row.children().eq(12).text();
            december = row.children().eq(13).text();
        }
    });
    
    var data = {name: name, annual_estate: annual_estate, annual_estimation_id:annual_estimation_id, january: january, february: february, march: march, april: april, may: may, june: june, july: july, august: august, september: september, octuber: octuber, november:november, december: december};
    var token = $('#token').val();
    var route = '{{ route('activities.update', 'id')}}';
    route = route.replace('id', activity_id);
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'JSON',
        data: data,
        success: function(){
            loadData();
        },
    });
};

function UpdateActivityFour(btn, count)
{
//    console.log('id '+ btn.value);
//    console.log('count '+ count);
    var activity_id = btn.value;
    var annual_estimation_id = {{ $annual_estimation_id }};
    var name, annual_estate, january, february, march, april, may,
        june, july, august, september, octuber, november, december;
    $('#mainTableFour tbody tr').each(function() {
        var row = $(this);
        if(row.index() === count){
            name = row.children().eq(0).text();
            annual_estate = row.children().eq(1).text();
            january = row.children().eq(2).text();
            february = row.children().eq(3).text();
            march = row.children().eq(4).text();
            april = row.children().eq(5).text();
            may = row.children().eq(6).text();
            june = row.children().eq(7).text();
            july = row.children().eq(8).text();
            august = row.children().eq(9).text();
            september = row.children().eq(10).text();
            octuber = row.children().eq(11).text();
            november = row.children().eq(12).text();
            december = row.children().eq(13).text();
        }
    });
    
    var data = {name: name, annual_estate: annual_estate, annual_estimation_id:annual_estimation_id, january: january, february: february, march: march, april: april, may: may, june: june, july: july, august: august, september: september, octuber: octuber, november:november, december: december};
    var token = $('#token').val();
    var route = '{{ route('activities.update', 'id')}}';
    route = route.replace('id', activity_id);
    $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'PUT',
        dataType: 'JSON',
        data: data,
        success: function(){
            loadData();
        },
    });
};


function DeleteActivityOne(btn)
{
    var result = confirm("¿Seguro que deseas eliminarlo?");
    if(result){
        var activity_id = btn.value;
        var annual_estimation_id = {{ $annual_estimation_id }};

//        console.log('id ' + activity_id);
//        console.log('count ' + annual_estimation_id);
        var data = {annual_estimation_id:annual_estimation_id};
        var token = $('#token').val();
        var route = '{{ route('activities.destroy', 'id')}}';
        route = route.replace('id', activity_id);
        $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            type: 'GET',
            dataType: 'JSON',
            data: data,
            success: function(){
                loadData();
            },
        });
    }
};
  
  
</script>

<script src="{{ asset('editabletable/mindmup-editabletable.js')}}"></script>
<script src="{{ asset('editabletable/numeric-input-example.js')}}"></script>

@endSection