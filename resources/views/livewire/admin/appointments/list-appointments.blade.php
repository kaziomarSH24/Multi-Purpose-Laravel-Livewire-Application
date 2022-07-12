<div>

  {{-- <x-loading-indicator/> --}}

  <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Appointments</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="{{route('admin.appointment')}}">Dashboard</a></li>
             <li class="breadcrumb-item active">Appointments</li>
           </ol>
         </div>
       </div>

               <div class="row mt-4">
                 <div class="col-12">
                     <div class="d-flex justify-content-between">
                        <div>
                          <a href="{{ route('admin.appointments.create') }}">
                            <button type="button" class="btn mb-2 bg-gradient-primary"><i class="fa fa-plus-circle mr-1"></i>Add New Appointment</button>
                          </a>
                          @if($selectedRows)
                            <div class="btn-group mb-2 ml-2">
                              <button type="button" class="btn btn-default">Bulk Actions</button>
                              <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu" style="">
                                <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Delete Selected</a>
                                <a class="dropdown-item" wire:click.prevent="markAllAsScheduled" href="#">Mark as Scheduled</a>
                                <a class="dropdown-item" wire:click.prevent="markAllAsClosed" href="#">Mark as Closed</a>
                              </div>
                            </div>
                            <span class="ml-2">Selected {{count($selectedRows)}} {{Str::plural('appointment', count($selectedRows))}}</span>
                          @endif
                        </div>
                        <div class="btn-group mb-2">
                          <button wire:click="filterAppointmentByStatus" type="button" class="btn {{is_null($status) ? 'btn-secondary' : 'btn-default'}}">
                            <span class="mr-1">All</span>
                            <span class="badge badge-pill badge-info">{{$appointmentsCount}}</span>
                          </button>

                          <button wire:click="filterAppointmentByStatus('scheduled')" type="button" class="btn {{$status === 'scheduled' ? 'btn-secondary' : 'btn-default'}}">
                            <span class="mr-1">Scheduled</span>
                            <span class="badge badge-pill badge-primary">{{$scheduledAppointmentsCount}}</span>
                          </button>

                          <button wire:click="filterAppointmentByStatus('closed')" type="button" class="btn {{$status === 'closed' ? 'btn-secondary' : 'btn-default'}}">
                            <span class="mr-1">Closed</span>
                            <span class="badge badge-pill badge-success">{{$closedAppointmentsCount}}</span>
                          </button>
                        </div>
                     </div>
                   <div class="card">
                     <div class="card-header">
                       <h3 class="card-title">Appointment List</h3>
       
                       <div class="card-tools">
                        <x-search-input wire:model="searchAppointment" :target="'searchAppointment'"/>
                       </div>
                     </div>
                     
                     <div class="card-body table-responsive p-0">
                       <table class="table table-hover text-nowrap">
                         <thead>
                           <tr>
                            <th>
                              <div class="icheck-primary d-inline ml-2">
                                <input wire:model="selectPageRows" type="checkbox" value="" id="appointmentCheck1">
                                <label for="appointmentCheck1"></label>
                              </div>
                            </th>
                             <th>ID</th>
                             <th>Client Name</th>
                             <th>Date</th>
                             <th>Time</th>
                             <th>Status</th>
                             <th>Options</th>
                           </tr>
                         </thead>
                         <tbody>
                            @php
                                 $i = 1;
                            @endphp
                          @forelse ($appointments as $appointment)
                                                         
                           <tr>
                            <th>
                              <div class="icheck-primary d-inline ml-2">
                                <input wire:model="selectedRows" type="checkbox" value="{{$appointment->id}}" id="{{$appointment->id}}">
                                <label for="{{$appointment->id}}"></label>
                              </div>
                            </th>
                            <td>{{$i++}}</td>
                            <td>{{$appointment->client->name}}</td>
                            <td>{{$appointment->date}}</td> {{-- function created on AppServiceProvider.php --}}
                            <td>{{$appointment->time}}</td>  {{-- function created on AppServiceProvider.php --}}
                            <td>
                              <span class="badge badge-{{$appointment->status_badge}}">{{$appointment->status}}</span>  {{-- 'status_badge' is created on Appointment.php Model file--}}
                            </td>
                            <td>
                                <a href="{{route('admin.appointments.edit', $appointment)}}"><i class="fa fa-edit mr-2"></i></a>
                                <a href="" wire:click.prevent="confirmAppointmentRemobval({{$appointment->id}})"><i class="fa fa-trash text-danger"></i></a>
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
                       {{-- @dump($selectedRows) --}}
                     </div>
                    <div class="card-footer d-flex justify-content-end">
                      {!!$appointments->links()!!}
                    </div>
                   </div>
                   
                 </div>
               </div>
               
     </div> 
   </div>
   <x-confirmation-alert/>
</div>
 
 
 
 