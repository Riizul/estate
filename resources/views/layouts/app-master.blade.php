<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ebeye</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! url('assets/AdminLTE/dist/css/adminlte.min.css') !!}">
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
    <!-- Page specific style -->
    @yield('styles')
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navigation bar -->
    @include('layouts.partials.navbar') 

    <!-- Content Wrapper. Contains page content -->
    @yield('content')

  </div>

  <!-- jQuery -->
  <script src="{!! url('assets/AdminLTE/plugins/jquery/jquery.min.js') !!}"></script>
  <!-- Bootstrap 4 -->
  <script src="{!! url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
  <!-- AdminLTE App -->
  <script src="{!! url('assets/AdminLTE/dist/js/adminlte.min.js') !!}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{!! url('assets/AdminLTE/dist/js/demo.js') !!}"></script>
  <!-- Page specific script -->
  @yield('scripts')
</body>
</html>
