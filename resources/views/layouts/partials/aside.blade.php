<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->avatar_url}}" id="profileImageAsid" class="img-circle elevation-2" alt="User Image" width="100%">
        </div>
        <div class="info">
          <a href="#" x-user="username" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->is('admin/dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.appointment')}}" class="nav-link {{request()->is('admin/appointment') ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Appointments
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link {{request()->is('admin/users') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.messages')}}" class="nav-link {{request()->is('admin/messages') ? 'active' : ''}}">
              <i class="nav-icon fa-light fa-messages"></i>
              <p>
                Messages
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a x-ref="editProfileLink" href="{{route('admin.profile.edit')}}" class="nav-link {{request()->is('admin/profile') ? 'active' : ''}}">
              <i class="nav-icon fa-light fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.settings')}}" class="nav-link {{request()->is('admin/settings') ? 'active' : ''}}"">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Settings
              </p>
            </a>
          </li>

          <li class="nav-item">
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>