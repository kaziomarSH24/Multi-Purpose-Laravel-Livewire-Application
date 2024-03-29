<div>
  <!-- Loading indicator for specific target -->
  <x-loading-indicator :target="'edit'"/>
  <x-loading-indicator :target="'confirmUserRemoval'"/>
  <x-loading-indicator :target="'addNew'"/>


   <div class="content-header" style="display: block">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </div>
      </div>

        <div class="row mt-4">
          <div class="col-12">
              <div class="d-flex justify-content-end">
                <button wire:click.prevent="addNew" type="button" class="btn mb-2 bg-gradient-primary"><i class="fa fa-plus-circle mr-1"></i>Add New User</button>
              </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>
                <div class="card-tools">
                  <x-search-input wire:model="searchTerm" :target="'searchTerm'"/>
                </div>
              </div>
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>
                        Name
                        <span wire:click="sortBy('name')" class="float-right text-sm" style="cursor: pointer;">
                          <i class="fa fa-arrow-up {{$sortColmunName === 'name' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                          <i class="fa fa-arrow-down {{$sortColmunName === 'name' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                        </span>
                      </th>
                      <th>
                        Email
                        <span wire:click="sortBy('email')" class="float-right text-sm" style="cursor: pointer;">
                          <i class="fa fa-arrow-up {{$sortColmunName === 'email' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                          <i class="fa fa-arrow-down {{$sortColmunName === 'email' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                        </span>
                      </th>
                      <th>Role</th>
                      <th>Registerd Time</th>
                      <th>Registerd Date</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody wire:loading.class="text-muted">
                    @forelse ($users as $index => $user)

                    {{-- @dump($users->firstItem())
                    @dump($index) --}}
                    <tr>
                      <td>{{$users->firstItem() + $index}}</td>
                      <td>
                        {{-- <img src="{{ Storage::disk('avatars')->url($user->avatar) }}" alt="" style="width: 50px"> --}}
                        <img src="{{ $user->avatar_url }}" alt="" style="width: 50px"> <!-- avatar_url() create in User.php model -->
                      </td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        <select class="form-control" wire:change="changeRole({{$user}},$event.target.value)">
                          <option value="admin" {{($user->role === 'admin') ? 'selected' : ''}}>ADMIN</option>
                          <option value="user" {{($user->role === 'user') ? 'selected' : ''}}>USER</option>
                        </select>
                      </td>
                      <td>{{$user->created_at->toFormattedTime()}}</td> {{-- function created on AppServiceProvider.php --}}
                      <td>{{$user->created_at->toFormattedDate()}}</td> {{-- function created on AppServiceProvider.php --}}
                      <td>
                          <a href="" wire:click.prevent="edit({{$user}})"><i class="fa fa-edit mr-2"></i></a>
                          <a href="" wire:click.prevent="confirmUserRemoval({{$user->id}})"><i class="fa fa-trash text-danger"></i></a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="8" class="text-center">
                        <img src="{{asset('img')}}/icon/undraw_void_-3-ggu.svg" alt="No result found" width="100px">
                        <h3 class="mt-2">No result found</h3>
                      </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex justify-content-end">
              {{$users->links()}}
              </div>
            </div>
            
          </div>
        </div>
        
    </div> 
  </div>


  <!-- Modal --> 
  <div class="modal fade" id="addUsers" aria-hidden="true" wire:ignore.self> <!-- "wire:ignore.self" used for unwanted modal problem -->
    <div class="modal-dialog modal-lg">
      <form autocomplete="off"  wire:submit.prevent="{{$showEditModal ? 'updateUser' : 'createUser'}}">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">
              @if ($showEditModal) <!-- This condition form Update Data By same modal form-->
              <span>Edit User</span>
              @else
              <span>Add New User</span>
              @endif
             
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter full name" wire:model.defer="state.name">
              @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" wire:model.defer="state.email">
              @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Password" wire:model.defer="state.password">
              @error('password')
              <div class="invalid-feedback">
                {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="passwordConfirmation">Confirm Password</label>
              <input type="password" class="form-control" id="passwordConfirmation" placeholder="Confirm Password" wire:model.defer="state.password_confirmation">
            </div>
            <div class="form-group">
              <label for="customFile">Profile Image</label> 
              <div class="custom-file">  
                <div x-data="{ isUploading: false, progress: 5 }"  
                     x-on:livewire-upload-start = "isUploading = true"
                     x-on:livewire-upload-finish = "isUploading = false; progress = 5"
                     x-on:livewire-upload-error = "isUploading = false"
                     x-on:livewire-upload-progress = "progress = $event.detail.progress"
                > <!---- use alpine js for image uploading progress bar ---->


                  <input wire:model="photo" type="file" class="custom-file-input" id="customFile"> <!-- create this fild in database command is 'php artisan make:migration add_avatar_field_to_users_table' -->
                  <div x-show.transition="isUploading" class=" progress progress-sm my-2 rounded">
                    <div class="progress-bar bg-indigo progress-bar-striped " role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </div>
                <label class="custom-file-label" for="customFile">
                  @if ($photo)
                      {{$photo->getClientOriginalName()}}
                  @else
                      Choose image
                  @endif
                </label>
              </div>
                @if ($photo)
                    <img src="{{$photo->temporaryUrl()}}" class="img d-block my-2 w-50" alt="">
                @else
                    <img src="{{ $state['avatar_url'] ?? ''}}" class="img d-block my-2 w-50" alt="">
                    <!-- avatar_url function appents in user.php model -->
                @endif
            </div>
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Close</button>
          @if ($showEditModal)
              <div wire:ignore>
                <x-button :target="'updateUser'">
                  <i wire:loading.remove wire:target="updateUser" class="fa fa-save mr-1"></i>
                  <span>Save Changes</span>
                </x-button>
              </div>
          @else
              <x-button :target="'createUser'">
                <i wire:loading.remove wire:target="createUser" class="fa fa-save mr-1"></i>
                <span>Save</span>
              </x-button>
          @endif
          </div>
        </div>
      </form>
    </div>
  
  </div>
  <!-- Modal End--> 

  <!-- Confirmation Modal --> 
  <div class="modal fade" id="confirmationModal" aria-hidden="true" wire:ignore.self> {{-- "wire:ignore.self" used for unwanted modal problem --}}
    <div class="modal-dialog modal-sm" style="max-width: 500px">
      <div class="modal-content">
        <div class="modal-header">
          <h5>Delete User</h5>
        </div>
        <div class="modal-body">
          <h4>Are you sure you want to delete this user?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Close</button>
          <div wire:ignore>
            <x-button wire:click.prevent="deleteUser" class="btn-danger" :target="'deleteUser'">
              <i wire:loading.remove wire:target="deleteUser" class="fa fa-trash-alt mr-1"></i>Delete User
            </x-button>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  <!-- Confirmation Modal End--> 
</div>



