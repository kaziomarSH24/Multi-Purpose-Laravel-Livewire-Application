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
                        <form action="#" wire:submit.prevent="createAppointment">
                            <div class="card-header">
                            <h3 class="card-title">Date picker</h3>
                            </div>
                            <div class="card-body">
                            <!-- Date -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Client:</label>
                                        <select class="form-control" wire:model.defer="state.client_id">
                                        <option value="">Select Client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
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
                                </div>
                                <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                    <label>Note:</label> (Optional)
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."  wire:model.defer="state.note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-secondary"><i class="fa fa-times mr-1"></i>Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
      let _date = $('#appointmentDate');
      let _time = $('#appointmentTime');
      _date.datetimepicker({
        format: 'L'
      });
      _time.datetimepicker({
        format: 'LT'
      });
      _date.on("change.datetimepicker",function(e){
        let _appointmentDate = _date.children('input').val();
       eval(@this).set('state.date',_appointmentDate);
      });
      _time.on('change.datetimepicker',function(e){
        let _appointmentTime = _time.children('input').val();
        eval(@this).set('state.time',_appointmentTime);
      });
    });
  </script>
@endpush