<div>
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
                     <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.appointments.create') }}">
                            <button type="button" class="btn mb-2 bg-gradient-primary"><i class="fa fa-plus-circle mr-1"></i>Add New Appointment</button>
                        </a>
                     </div>
                   <div class="card">
                     <div class="card-header">
                       <h3 class="card-title">Responsive Hover Table</h3>
       
                       <div class="card-tools">
                         <div class="input-group input-group-sm" style="width: 150px;">
                           <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
       
                           <div class="input-group-append">
                             <button type="submit" class="btn btn-default">
                               <i class="fas fa-search"></i>
                             </button>
                           </div>
                         </div>
                       </div>
                     </div>
                     
                     <div class="card-body table-responsive p-0">
                       <table class="table table-hover text-nowrap">
                         <thead>
                           <tr>
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
                          @foreach ($appointments as $appointment)
                                                         
                           <tr>
                            <td>{{$i++}}</td>
                            <td>{{$appointment->client->name}}</td>
                            <td>{{$appointment->date->toFormattedDate()}}</td> {{-- function created on AppServiceProvider.php --}}
                            <td>{{$appointment->time->toFormattedTime()}}</td>  {{-- function created on AppServiceProvider.php --}}
                            <td>
                              <span class="badge badge-{{$appointment->status_badge}}">{{$appointment->status}}</span>  {{-- 'status_badge' is created on Appointment.php Model file--}}
                            </td>
                            <td>
                                <a href=""><i class="fa fa-edit mr-2"></i></a>
                                <a href=""><i class="fa fa-trash text-danger"></i></a>
                            </td>
                          </tr>
                          @endforeach
                           
                         </tbody>
                       </table>
                     </div>
                    <div class="card-footer d-flex justify-content-end">
                     
                    </div>
                   </div>
                   
                 </div>
               </div>
               
     </div> 
   </div>
 
 
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
 
 
 
 