<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
  <!-- Toastr Plugin -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/toastr/toastr.min.css">
  <!-- Tempusdominus Bootstrap 4 / datetimepicker css -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
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
  </script>

@stack('js')

@livewireScripts
</body>
</html>
