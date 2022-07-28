    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
           <div class="d-flex justify-content-between">
            <div wire:loading>
              <x-animations.ballbeat/>
          </div>
            <h3 wire:loading.remove>{{$appointmentsCount}}</h3>
            <select wire:change="getAppointmentsCount($event.target.value)" class="form-control">
                <option value="">All</option>
                <option value="scheduled">Scheduled</option>
                <option value="closed">Closed</option>
            </select>
           </div>

            <p>Appointments</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{route('admin.appointment')}}" class="small-box-footer">View Appointments <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

