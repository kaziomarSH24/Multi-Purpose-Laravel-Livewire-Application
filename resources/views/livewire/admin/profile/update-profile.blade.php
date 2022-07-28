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
                  <div class="text-center" x-data="{imagePreview: '{{auth()->user()->avatar_url}}'}">
                    <input class="d-none" wire:model="image" type="file" x-ref="image" 
                        x-on:change="
                            reader = new FileReader();
                            reader.onload = (event) => {
                                imagePreview = event.target.result;
                                document.getElementById('profileImage').src = `${imagePreview}`;
                            };
                            reader.readAsDataURL($refs.image.files[0]);
                            
                        "
                    >
                    <img @click="$refs.image.click()" class="profile-user-img img-fluid img-circle" x-bind:src="imagePreview ? imagePreview : '{{asset('backend/dist/img/user4-128x128.jpg')}}'" alt="User profile picture">
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