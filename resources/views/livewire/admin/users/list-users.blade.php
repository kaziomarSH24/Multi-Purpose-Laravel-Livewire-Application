<div>
   <div class="content-header">
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

      {{-- @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fa fa-check-circle mr1"></i> Success!</strong> {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif --}}
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
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registerd Time</th>
                            <th>Registerd Date</th>
                            <th>Options</th>
                          </tr>
                        </thead>
                        <tbody wire:loading.class="text-muted">
                          @forelse ($users as $user)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->toFormattedTime()}}</td> {{-- function created on AppServiceProvider.php --}}
                            <td>{{$user->created_at->toFormattedDate()}}</td> {{-- function created on AppServiceProvider.php --}}
                            <td>
                                <a href="" wire:click.prevent="edit({{$user}})"><i class="fa fa-edit mr-2"></i></a>
                                <a href="" wire:click.prevent="confirmUserRemoval({{$user->id}})"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="6" class="text-center">
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
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Close</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
              @if ($showEditModal) <!-- This condition form Update Data By same modal form-->
              <span>Save Changes</span>
              @else
              <span>Save</span>
              @endif
            </button>
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
          <button type="button" class="btn btn-danger" wire:click.prevent="deleteUser"><i class="fa fa-trash-alt mr-1"></i>Delete User</button>
        </div>
      </div>
    </div>
  
  </div>
  <!-- Confirmation Modal End--> 
</div>



