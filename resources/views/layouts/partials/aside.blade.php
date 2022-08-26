<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">MedReco</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="pb-3 mt-3 mb-3 user-panel d-flex">
      <div class="image">
        <img src="{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
               لوحة التحكم
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-nurse"></i>
            <p>
               العملاء
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.specializations.index') }}" class="nav-link {{ request()->is('admin/specializations*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-clinic-medical"></i>
            <p>
               التخصصات
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              تسجيل الخروج
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>