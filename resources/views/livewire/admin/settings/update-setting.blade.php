<div>
  {{-- @dd(setting('site_email')); --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Settings</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

          <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">General Settings</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form wire:submit.prevent="updateSetting">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="siteName">Site Name</label>
                      <input wire:model.defer="state.site_name" type="text" class="form-control" id="siteName" placeholder="Enter site name">
                    </div>
                    <div class="form-group">
                      <label for="siteEmail">Site Email</label>
                      <input wire:model.defer="state.site_email" type="email" class="form-control" id="siteEmail" placeholder="Enter site email">
                    </div>
                    <div class="form-group">
                      <label for="siteTitle">Site Title</label>
                      <input wire:model.defer="state.site_title" type="text" class="form-control" id="siteTitle" placeholder="Enter site title">
                    </div>
                    <div class="form-group">
                      <label for="footerText">Footer Text</label>
                      <input wire:model.defer="state.footer_text" type="text" class="form-control" id="footerText" placeholder="Enter footer text">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input wire:model.defer="state.sidebar_collapse" type="checkbox" class="custom-control-input" id="sidebarCollapse">
                        <label class="custom-control-label" for="sidebarCollapse">Sidebar Collapse</label>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <x-button> 
                      <i wire:loading.remove wire:target="updateSetting" class="fa fa-save mr-1"></i> Save Changes 
                    </x-button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
    </section>
</div>

@push('js')
    <script>
      $('#sidebarCollapse').on('change', function (){
        $('body').toggleClass('sidebar-collapse');
      });
      $('form').on('submit', function (){
        let footerText = $('#footerText').val();
        let siteEmail = $('#siteEmail').val();
        let siteTitle = $('#siteTitle').val();
        let siteName = $('#siteName').val();

        if(siteTitle || siteName){
          $('title').text(siteTitle + " | " + siteName);
        }

        if(siteEmail){
          let _setEmail = $('.footerRight span a');
          _setEmail.attr('href', 'mailTo:'+siteEmail);
          _setEmail.text(siteEmail);
        }

        if(footerText){
          // console.log(footerText);
          $('.footerLeft').html(footerText);
        }
      })
    </script>
@endpush