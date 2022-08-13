<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ setting('site_title')}} | {{setting('site_name')}}</title>

  <link rel="stylesheet" href="/css/app.css">



  


  @stack('styles')

  @livewireStyles
</head>
<body class="hold-transition sidebar-mini {{setting('sidebar_collapse') ? 'sidebar-collapse' : ''}}">
<div class="wrapper">

  <!-- Navbar --> 
  @include('layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.partials.aside')

  <div class="content-wrapper">

   {{ $slot }}
   
  </div>



  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p> 
    </div>
  </aside>


  @include('layouts.partials.footer')

</div>
<!-- ./wrapper -->





<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/js/app.js"></script>
<script src="/js/backend.js"></script>

@stack('js')

@stack('before-livewire-scripts')

@livewireScripts

@stack('after-livewire-scripts')
<!-- Livewire sortable cdn -->
@stack('alpine-plugin')
<!--alpine JS CDN -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
