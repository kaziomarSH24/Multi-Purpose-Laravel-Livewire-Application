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
  <style>
    /*!
 * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
 * Copyright 2015 Daniel Cardoso <@DanielCardoso>
 * Licensed under MIT
 */
.la-ball-clip-rotate,
.la-ball-clip-rotate > div {
    position: relative;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}
.la-ball-clip-rotate {
    display: block;
    font-size: 0;
    color: #fff;
}
.la-ball-clip-rotate.la-dark {
    color: #333;
}
.la-ball-clip-rotate > div {
    display: inline-block;
    float: none;
    background-color: currentColor;
    border: 0 solid currentColor;
}
.la-ball-clip-rotate {
    width: 32px;
    height: 32px;
}
.la-ball-clip-rotate > div {
    width: 32px;
    height: 32px;
    background: transparent;
    border-width: 2px;
    border-bottom-color: transparent;
    border-radius: 100%;
    -webkit-animation: ball-clip-rotate .75s linear infinite;
       -moz-animation: ball-clip-rotate .75s linear infinite;
         -o-animation: ball-clip-rotate .75s linear infinite;
            animation: ball-clip-rotate .75s linear infinite;
}
.la-ball-clip-rotate.la-sm {
    width: 16px;
    height: 16px;
}
.la-ball-clip-rotate.la-sm > div {
    width: 16px;
    height: 16px;
    border-width: 1px;
}
.la-ball-clip-rotate.la-2x {
    width: 64px;
    height: 64px;
}
.la-ball-clip-rotate.la-2x > div {
    width: 64px;
    height: 64px;
    border-width: 4px;
}
.la-ball-clip-rotate.la-3x {
    width: 96px;
    height: 96px;
}
.la-ball-clip-rotate.la-3x > div {
    width: 96px;
    height: 96px;
    border-width: 6px;
}
/*
 * Animation
 */
@-webkit-keyframes ball-clip-rotate {
    0% {
        -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
    }
    50% {
        -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
    }
}
@-moz-keyframes ball-clip-rotate {
    0% {
        -moz-transform: rotate(0deg);
             transform: rotate(0deg);
    }
    50% {
        -moz-transform: rotate(180deg);
             transform: rotate(180deg);
    }
    100% {
        -moz-transform: rotate(360deg);
             transform: rotate(360deg);
    }
}
@-o-keyframes ball-clip-rotate {
    0% {
        -o-transform: rotate(0deg);
           transform: rotate(0deg);
    }
    50% {
        -o-transform: rotate(180deg);
           transform: rotate(180deg);
    }
    100% {
        -o-transform: rotate(360deg);
           transform: rotate(360deg);
    }
}
@keyframes ball-clip-rotate {
    0% {
        -webkit-transform: rotate(0deg);
           -moz-transform: rotate(0deg);
             -o-transform: rotate(0deg);
                transform: rotate(0deg);
    }
    50% {
        -webkit-transform: rotate(180deg);
           -moz-transform: rotate(180deg);
             -o-transform: rotate(180deg);
                transform: rotate(180deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
           -moz-transform: rotate(360deg);
             -o-transform: rotate(360deg);
                transform: rotate(360deg);
    }
}
  </style>
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
    window.addEventListener('alert', event => {
            toastr.success(event.detail.message, 'Success!');
          })

  </script>

@stack('js')

@livewireScripts
</body>
</html>
