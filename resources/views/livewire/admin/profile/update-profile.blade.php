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
                                document.getElementById('profileImageAsid').src = `${imagePreview}`;
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
              <div class="card" x-data="{currentTab: $persist('editProfile') }">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li @click.prevent="currentTab = 'editProfile'" wire:ignore class="nav-item"><a class="nav-link" :class="currentTab === 'editProfile' ? 'active' : '' " href="#editProfile" data-toggle="tab"><i class="fa-solid fa-user mr-1"></i> Edit Profile</a></li>
                    <li @click.prevent="currentTab = 'changePassword'" wire:ignore class="nav-item" ><a class="nav-link" :class="currentTab === 'changePassword' ? 'active' : '' " href="#changePassword" data-toggle="tab"><i class="fa-solid fa-key mr-1"></i> Change Password</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                      <div wire:ignore.self class="tab-pane" :class="currentTab === 'editProfile' ? 'active' : '' " id="editProfile">
                        <form wire:submit.prevent="updateProfile" id="authUserUpdateProfile" class="form-horizontal">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input wire:model.defer="state.name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name">
                              @error('name')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input wire:model.defer="state.email" type="text" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email">
                              @error('email')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <x-button :target="'updateProfile'" class="btn-success"> <i class="fa fa-save mr-1"></i> Save Change</x-button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->


                      <div wire:ignore.self class="tab-pane" :class="currentTab === 'changePassword' ? 'active' : '' " id="changePassword">
                        <form wire:submit.prevent="changePassword" id="authUserUpdateProfile" class="form-horizontal">
                          <div class="form-group row">
                            <label for="currentPassword" class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-9">
                              <input wire:model.defer="state.current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="currentPassword" placeholder="Current Password">
                              @error('current_password')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="newPassword" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                              <input wire:model.defer="state.password" type="password" class="form-control @error('password') is-invalid @enderror" id="newPassword" placeholder="New Password">
                              @error('password')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="confirmNewPassword" class="col-sm-3 col-form-label">Confirm New Password</label>
                            <div class="col-sm-9">
                              <input wire:model.defer="state.password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmNewPassword" placeholder="Confirm New Password">
                              @error('password_confirmation')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                              <x-button :target="'changePassword'" class="btn-success"> <i class="fa fa-save mr-1"></i> Save Change</x-button>
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

  @push('alpine-plugin')
      <!-- Alpine Plugins -->
      <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
  @endpush  

  @push('js')
    {{-- <script>
      $(document).ready(function () {
        $('#authUserUpdateProfile').submit(function (e) { 
          e.preventDefault();
          let name = $('#inputName').val();
          $('#authUserName').text(name);
        });
      });
    </script> --}}

    <script>
      $(document).ready(function () {
        Livewire.on('nameChanged',(changeName) => {
         $('[x-user="username"]').text(changeName);
        })
      });
    </script>
  @endpush