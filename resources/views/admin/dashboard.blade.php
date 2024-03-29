@push('styles')
    <style>
        select.form-control{
            position: relative;
            height:2rem;
            width: 7.5rem;
        }
        .small-box:hover select.form-control{
            z-index: 9;
        }
    </style>
@endpush

<x-admin-layout>
<div>
   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <livewire:admin.dashboard.appointments-count/>
        <!-- ./col -->
        <livewire:admin.dashboard.users-count/>

        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

</x-admin-layout>