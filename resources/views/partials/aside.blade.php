<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E K R A A</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
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

      <a href="#" class="nav-link">
        <p>
          USERS
        </p>
      </a>
      <a href="{{route('students.index')}}" class="nav-link">
        <p>
          STUDENTS
        </p>
      </a>
      <a href="{{route('levels.index')}}" class="nav-link">
        <p>
          LEVELS
        </p>
      </a>
      <a href="{{route('departments.index')}}" class="nav-link">
        <p>
          DEPARTMENTS
        </p>
      </a>
      <a href="{{route('Courses.index')}}" class="nav-link">
        <p>
          COURSES
        </p>
      </a>
      <a href="{{route('lectures.index')}}" class="nav-link">
        <p>
          LECTURES
        </p>
      </a>

    </div>
    <!-- /.sidebar -->
  </aside>
