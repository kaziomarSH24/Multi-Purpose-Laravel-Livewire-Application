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

{{-- <!-- REQUIRED SCRIPTS --> --}}

{{-- <!-- jQuery --> --}}
<script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend')}}/dist/js/adminlte.min.js"></script>
<!-- Toastr JS -->
<script src="{{asset('backend')}}/plugins/toastr/toastr.min.js"></script>
<!-- Tempusdominus Bootstrap 4 / datetimepicker js -->
<script src="https://unpkg.com/moment"></script>
<script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- CKEditor cdn -->
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('backend')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>







  <script>
  window.addEventListener('show-form', event => {
    $('#addUsers').modal('show');
    
  })
  window.addEventListener('show-delete-modal', event => {
    $('#confirmationModal').modal('show');
    
  })
  window.addEventListener('hide-delete-modal', event => {
    $('#confirmationModal').modal('hide');
    toastr.success(event.detail.message, 'Success!')
  })
 </script>

  <script>
    $(document).ready(function () {
      toastr.options = {
          "progressBar": true,
          "positionClass": "toast-bottom-right",
          }
          window.addEventListener('hide-form', event => {
            $('#addUsers').modal('hide');
            toastr.success(event.detail.message, 'Success!');
          })
    });
      window.addEventListener('alert', event => {
            toastr.success(event.detail.message, 'Success!');
          })
      window.addEventListener('updated', event => {
            toastr.success(event.detail.message, 'Success!');
          })
  </script>

@stack('js')


<script>
  $(document).ready(() => {
    $('[x-ref="editProfileLink"]').on('click', () => {
      localStorage.setItem('_x_currentTab','"editProfile"');
    });
    $('[x-ref="changePasswordLink"]').on('click', () => {
      localStorage.setItem('_x_currentTab','"changePassword"');
    });
  });
</script>

@livewireScripts
<!-- Livewire sortable cdn -->
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
</body>
</html>
