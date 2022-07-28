<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <div class="d-flex justify-content-between">
            <div wire:loading>
                <x-animations.ballbeat/>
            </div>
              <h3 wire:loading.remove>{{$usersCount}}</h3>
              <select wire:change="getUsersCount($event.target.value)" class="form-control">
                  <option value="allUsers">All Users</option>
                  <option value="TODAY">Today</option>
                  <option value="30">30 days</option>
                  <option value="60">60 days</option>
                  <option value="360">360 days</option>
                  <option value="MTD">Month to Date</option>
                  <option value="YTD">Year to Date</option>
              </select>
        </div>
        <p>Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{route('admin.users')}}" class="small-box-footer">View Users <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>