<div>
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Users Profile</li>
            </ol>
          </div>
        </div>       
      </div> 
    </div>
    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <input class="d-none" onchange="preview()" wire:model="image" id="image" type="file">
                    <img id="img_pre" class="profile-user-img img-fluid img-circle" src="{{auth()->user()->avatar_url}}" alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
  
                  <p class="text-muted text-center text-capitalize">{{auth()->user()->role}}</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Change Password</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="settings">
                        <form class="form-horizontal">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

  </div>
  @push('js')
      <script>
        $(document).ready(function () {
          let _img = $('#image');
          $(document).on('click','#img_pre', function () {
            _img.click();
          });
          
        });

        // var loadFile = function(event) {
        //   var reader = new FileReader();
        //   reader.onload = function(){
        //     // var output = document.getElementById('img_pre');
        //     img_pre.src = reader.result;
        //     profileImage.src = reader.result;
        //   };
        //   reader.readAsDataURL(event.target.files[0]);
        // };

        function preview() {
          let _imgVal = event.target.files[0];
            
            profileImage.src=URL.createObjectURL(_imgVal);
            img_pre.src=URL.createObjectURL(_imgVal);
            // @this.set('image',_imgVal);
        }
      </script>
  @endpush
  @push('styles')
      <style>
        .profile-user-img{
            transition: all 0.3s
        }
        .profile-user-img:hover{
            background-color: blue;
            border-color: crimson;
            cursor: pointer;
        }
      </style>
  @endpush