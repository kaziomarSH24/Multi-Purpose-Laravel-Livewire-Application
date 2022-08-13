<div>
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1 class="m-0">Appointments</h1> --}}
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.appointment')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Appointments</li>
                <li class="breadcrumb-item active">Create</li>
              </ol>
            </div>
          </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="#" autocomplete="off" id="submitAppointment" wire:submit.prevent="createAppointment">
                            <div class="card-header">
                            <h3 class="card-title">Add new Appointment</h3>
                            </div>
                            <div class="card-body">
                            <!-- Date -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Client:</label>
                                        <select class="form-control @error('client_id') is-invalid @enderror" wire:model.defer="state.client_id">
                                        <option value="">Select Client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                        </select>
                                        @error('client_id')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Team Members</label>
                                        <div class="@error('members') is-invalid custom-error @enderror"> <!--Solving Bootstrap error message in select2 -->
                                            <x-inputs.select2 wire:model="state.members" id="teamMembers" placeholder="Select Members">
                                                <option>Alabama</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                                </x-inputs.select2>
                                        </div>
                                        @error('members')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                      </div>
                                      <!-- /.form-group -->
                                </div>
                                {{-- <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group" wire:ignore.self>
                                        <label>Color picker:</label>
                                        <input wire:model.defer="state.color" type="text" placeholder="Select Color" class="form-control @error('color') is-invalid @enderror" id="colorPicker">
                                        @error('color')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- /.form group -->
                                </div> --}}
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group" wire:ignore.self>
                                        <label>Color picker with addon:</label>
                    
                                        <div class="input-group" id="colorPicker">
                                        <input wire:model.defer="state.color" placeholder="Choose Color" type="text" name="color" class="form-control @error('color') is-invalid @enderror">
                    
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                                        </div>
                                        @error('color')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        </div>
                                        <!-- /.input group -->
                                        
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointmentDate">Appointment Date:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <x-datepicker wire:model.defer="state.date" placeholder="DD/MM/YYYY" id="appointmentDate" :error="'date'"/>
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appointmentTime">Appointment Time:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                            <x-timepicker wire:model.defer="state.time" placeholder="HH:MM" id="appointmentTime" :error="'time'"/>
                                            @error('time')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment Date:</label>
                                        <div class="input-group date" id="appointmentDate" data-target-input="nearest" wire:ignore>
                                            <input type="text" class="form-control datetimepicker-input"  data-target="#appointmentDate">
                                            <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment Time:</label>
                    
                                        <div wire:ignore class="input-group date" id="appointmentTime" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#appointmentTime">
                                        <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div> --}}
                                
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group" wire:ignore>
                                    <label>Note:</label> (Optional)
                                    <textarea id="note" class="form-control" rows="3" placeholder="Enter ..."  wire:model.defer="state.note"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <select class="form-control @error('status') is-invalid @enderror" wire:model.defer="state.status">
                                        <option value="">Select Status</option>
                                        <option value="SCHEDULED">Scheduled</option>
                                        <option value="CLOSED">Closed</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-times mr-1"></i>Close</button>
                            <x-button><i wire:loading.remove class="fa fa-save mr-1"></i>Save</x-button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('livewire/admin/appointments/appointments-js')
@include('livewire/admin/appointments/appointments-css')