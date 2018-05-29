<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Arya Adhi Prasetya">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/bootstrap.min.css') }}">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/datatables.bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/simple-line-icons.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/animate.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/fullcalendar.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/bootstrap-material-datetimepicker.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/nouislider.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/mediaelementplayer.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/ionrangeslider/ion.rangeSlider.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css') }}"/>
    <link href="{{ url('asset/css/style.css') }}" rel="stylesheet">
    <!-- end: Css -->
  </head>
  <body id="mimin" class="dashboard">
    @include('templates.sidenav')
    <main>
      @yield('content')
    </main>
  </body>
        <!-- start: Javascript -->
    <script src="{{ url('asset/js/jquery.min.js') }}"></script>
    <script src="{{ url('asset/js/jquery.ui.min.js') }}"></script>
    <script src="{{ url('asset/js/bootstrap.min.js') }}"></script>
   
    
    <!-- plugins -->
    <script src="{{ url('asset/js/plugins/moment.min.js') }}"></script>
    <script src="{{ url('asset/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ url('asset/js/plugins/jquery.nicescroll.js') }}"></script>
    <!-- custom -->
     <script src="{{ url('asset/js/main.js') }}"></script>
  <!-- end: Javascript -->
  @yield('asset_footer')
</html>
