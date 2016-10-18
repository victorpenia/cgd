<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <!--<link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css')}}">-->
  <!-- Ionicons -->
  <!--<link rel="stylesheet" href="{{ asset('ionicons-2.0.1/css/ionicons.min.css')}}">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css')}}">  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
<!--  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css')}}">
   Morris chart 
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css')}}">
   jvectormap 
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">-->
  <!--Date Picker--> 
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css')}}">
  <!--Daterange picker--> 
  <!--<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
   bootstrap wysihtml5 - text editor 
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--<body class="hold-transition skin-blue sidebar-mini">-->
@yield('body_toggle')    
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>dm</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>A</b>dministraci&oacute;n</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-warning">5</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 5 notificaciones pendientes</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 pagos pendientes
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> propietarios en mora
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver todo</a></li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <!--<img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">-->
              <span class="hidden-xs">{{ \Auth::user()->first_name . " " . \Auth::user()->last_name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('dist/img/avatar5.png')}}" class="img-circle" alt="User Image">

                <p>
                    {{ \Auth::user()->first_name . " " . \Auth::user()->last_name }}
                  <small>{{ \Auth::user()->role->name }}</small>
                </p>
              </li>              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Cambiar contrase&ntilde;a</a>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Cerrar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" id='main-sidebar'>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/' . \Auth::user()->generalSetting->logo)}}" class="img-rounded" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>CONDOMINIO</p>
          {{ \Auth::user()->generalSetting->name }}          
        </div>
      </div>
      <br>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        @yield('menu_treeview_one')
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-building"></i> Departamentos</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i> Ver lista de pagos</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i> Ver estado de cuentas</a></li>
            <li><a href="#" ><i class="fa fa-files-o"></i> Ver reservaciones</a></li>
          </ul>
        </li>
        @yield('menu_treeview_two')
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Configuraci&oacute;n Sistemas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-cubes"></i> M&oacute;dulos</a></li>
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-adjust"></i> Roles</a></li>
            <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> Usuarios</a></li>
          </ul>
        </li>
        @yield('menu_treeview_three')
          <a href="#">
            <i class="fa fa-building"></i>
            <span>Configuraci&oacute;n Condominio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('generalSetting.edit', 1) }}"><i class="fa fa-cogs"></i> Parametros Generales</a></li>
            <li><a href="{{ route('blocks.index') }}"><i class="fa fa-clone"></i> Bloques</a></li>
            <li><a href="{{ route('departments.index') }}"><i class="fa fa-building"></i> Departamentos</a></li>
            <li><a href="{{ route('placeParkings.index') }}"><i class="fa fa-car"></i> Parqueos</a></li>
            <li><a href="{{ route('placeClosets.index') }}"><i class="fa fa-columns"></i> Bauleras</a></li>
            <li><a href="{{ route('commonAreas.index') }}"><i class="fa fa-image"></i> Zonas comunes</a></li>
            <li><a href="{{ route('banks.index') }}"><i class="fa fa-bank"></i> Bancos</a></li>
            <li><a href="#"><i class="fa fa-group"></i> Proveedores</a></li> 
          </ul>
        </li>
        @yield('menu_treeview_four')
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Administraci&oacute;n</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('annualEstimations.index') }}"><i class="fa fa-circle-o"></i> Planificaci&oacute;n anual</a></li>
            
            <li><a href="{{ route('owners.index') }}"><i class="fa fa-users"></i> Propietarios</a></li>
            <li><a href="#"><i class="fa fa-building"></i> Departamentos</a></li>
          </ul>
        </li>
        <li><a href="documentation/index.html"><i class="fa fa-calendar"></i> <span>Calendario</span></a></li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Reservas areas</span></a></li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Cuotas</span></a></li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Consejo</span></a></li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentaci&oacute;n</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @include('flash::message')
    </section>
    
<!--    <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>
    <div class="container">
        
        
    </div>    -->
    @yield('content-wrapper')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
<!--    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.5
    </div>-->
    <strong>Copyright &copy; 2016-2017 <a href="#">Goohu technology</a> </strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
<!--  <aside class="control-sidebar control-sidebar-dark">
     Create the tabs 
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
     Tab panes 
    <div class="tab-content">
       Home tab content 
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
         /.control-sidebar-menu 

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
         /.control-sidebar-menu 

      </div>
       /.tab-pane 
       Stats tab content 
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
       /.tab-pane 
       Settings tab content 
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
           /.form-group 

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
           /.form-group 

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
           /.form-group 

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
           /.form-group 

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
           /.form-group 

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
           /.form-group 
        </form>
      </div>
       /.tab-pane 
    </div>
  </aside>-->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!--<div class="control-sidebar-bg"></div>-->
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
 Resolve conflict in jQuery UI tooltip with Bootstrap tooltip 
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>-->
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js')}}"></script>
 Sparkline 
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
 jvectormap 
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
 jQuery Knob Chart 
<script src="{{ asset('plugins/knob/jquery.knob.js')}}"></script>
 InputMask 
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
 daterangepicker 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>-->
 <!--datepicker--> 
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!--Bootstrap WYSIHTML5--> 
<!--<script src=" {{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
 Slimscroll 
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
 FastClick 
<script src="{{ asset('plugins/fastclick/fastclick.js')}}"></script>-->
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>

@yield('script_content')


<script>
  $(function () {
//    Initialize Select2 Elements
    $(".select2").select2();
//
//    //Datemask dd/mm/yyyy
//    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
//    //Datemask2 mm/dd/yyyy
//    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();
    $("#example1").DataTable();
    //Date range picker
//    $('#reservation').daterangepicker();
//    //Date range picker with time picker
//    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
//    //Date range as a button
//    $('#daterange-btn').daterangepicker(
//        {
//          ranges: {
//            'Today': [moment(), moment()],
//            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//            'This Month': [moment().startOf('month'), moment().endOf('month')],
//            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//          },
//          startDate: moment().subtract(29, 'days'),
//          endDate: moment()
//        },
//        function (start, end) {
//          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//        }
//    );
//
//    //Date picker
    $('#datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });
    
    $('#datepicker1').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });
    
    
    
//
//    //iCheck for checkbox and radio inputs
//    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
//      checkboxClass: 'icheckbox_minimal-blue',
//      radioClass: 'iradio_minimal-blue'
//    });
//    //Red color scheme for iCheck
//    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
//      checkboxClass: 'icheckbox_minimal-red',
//      radioClass: 'iradio_minimal-red'
//    });
//    //Flat red color scheme for iCheck
//    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
//      checkboxClass: 'icheckbox_flat-green',
//      radioClass: 'iradio_flat-green'
//    });
//
//    //Colorpicker
//    $(".my-colorpicker1").colorpicker();
//    //color picker with addon
//    $(".my-colorpicker2").colorpicker();
//
//    //Timepicker
//    $(".timepicker").timepicker({
//      showInputs: false
//    });
  });
  


  
</script>

</body>
</html>

