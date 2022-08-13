<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ setting('site_title')}} | {{setting('site_name')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome 6 pro Icons -->
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css"> 
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!--IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
  <!-- Toastr Plugin -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/toastr/toastr.min.css">
  <!-- Tempusdominus Bootstrap 4 / datetimepicker css -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  @stack('alpine-plugin')
  <!--alpine JS CDN -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

  @stack('styles')

  @livewireStyles
</head>
<body class="hold-transition sidebar-mini {{setting('sidebar_collapse') ? 'sidebar-collapse' : ''}}">
<div class="wrapper">

  {{-- <!-- Navbar --> --}}
  @include('layouts.partials.navbar')
  {{-- <!-- /.navbar --> --}}

  {{-- <!-- Main Sidebar Container --> --}}
  @include('layouts.partials.aside')

  {{-- <!-- Content Wrapper. Contains page content --> --}}
  <div class="content-wrapper">
   {{ $slot }}
  </div>



  <aside class="control-sidebar control-sidebar-dark">
    {{-- <!-- Control sidebar content goes here --> --}}
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p> 
    </div>
  </aside>
  {{-- <!-- /.control-sidebar --> --}}

  {{-- <!-- Main Footer --> --}}
  @include('layouts.partials.footer')
</div>
{{-- <!-- ./wrapper --> --}}





 <!-- REQUIRED SCRIPTS -->

{{-- <!-- jQuery --> --}}
<script src="/js/app.js"></script>
<script src="/js/backend.js"></script>

@stack('js')

@stack('before-livewire-scripts')

@livewireScripts

@stack('after-livewire-scripts')
<!-- Livewire sortable cdn -->

</body>
</html>
