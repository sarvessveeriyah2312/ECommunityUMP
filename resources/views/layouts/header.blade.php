 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
   
   
  </ul>
 
 <!-- Right navbar links -->
 <ul class="navbar-nav ml-auto">

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ url('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
     <!-- Logout Menu -->
     <li class="nav-item">
      <a class="nav-link"  href="{{ url('logout') }}" role="button">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
   
   
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ECommunityUMP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
        @if(Auth::user()->user_type == 1)
        <li class="nav-item">
          <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-home"></i>
            <p>
             Dashboard 
            </p>
          </a>
        </li>
        <!--Dropdown Menu -->
        <li class="nav-item">
          <a href="#" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('admin/admin') }}" class="nav-link">
                <i class="nav-icon fas fa-lock"></i>
                <p>
                  Administrator
                </p>
              </a>
              <li class="nav-item" class="nav-link @if(Request::segment(3) == 'admin') active @endif">
                <a href="{{ url('admin/lecturer') }}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Lecturer
                  </p>
                </a>
              <li class="nav-item">
                <a href="{{ url('admin/student') }}" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>
                    Student
                  </p>
                </a>
                <li class="nav-item">
                  <a href="{{ url('admin/parents') }}" class="nav-link">
                    <i class="nav-icon fas fa-star"></i>
                    <p>
                      Parents
                    </p>
                  </a>
                  <li class="nav-item">
                    <a href="{{ url('admin/staff') }}" class="nav-link">
                      <i class="nav-icon fas fa-id-badge"></i>
                      <p>
                        Staff
                      </p>
                    </a>
          </ul>
        </li>
        <!--Dropdown Menu Ends -->
        <li class="nav-item">
          <a href="" class="nav-link @if(Request::segment(2) == 'class') active @endif">
            <i class="nav-icon fas fa-landmark"></i>
            <p>
             Class 
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="" class="nav-link @if(Request::segment(2) == 'subject') active @endif">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
             Subject 
            </p>
          </a>
        </li>
          @elseif(Auth::user()->user_type == 2)
          <li class="nav-item">
            <a href="{{ url('lecturer/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type == 3)
          <li class="nav-item">
            <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Dashboard 
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type == 4)
          <li class="nav-item">
            <a href="{{ url('parent/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Dashboard  
              </p>
            </a>
          </li>
          @elseif(Auth::user()->user_type == 5)
          <li class="nav-item">
            <a href="{{ url('staff/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-home"></i>
              <p>
               Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link @if(Request::segment(2) == 'class') active @endif">
              <i class="nav-icon fas fa-landmark"></i>
              <p>
               Class 
              </p>
            </a>
          </li>
  
          <li class="nav-item">
            <a href="" class="nav-link @if(Request::segment(2) == 'subject') active @endif">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
               Subject 
              </p>
            </a>
          </li>
          @endif
         
        <li class="nav-item">
          <a href="{{ url('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
        

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>