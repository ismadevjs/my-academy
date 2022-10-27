<nav id="sidebar" aria-label="Main Navigation">
  <!-- Side Header -->
  <div class="bg-header-dark">
    <div class="content-header bg-white-5">
      <!-- Logo -->
      <a class="fw-semibold text-white tracking-wide" href="index.html">
        Admin Area
      </a>
      <!-- END Logo -->

      <!-- Options -->
      <div>
        <!-- Close Sidebar, Visible only on mobile screens -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
          <i class="fa fa-times-circle"></i>
        </button>
        <!-- END Close Sidebar -->
      </div>
      <!-- END Options -->
    </div>
  </div>
  <!-- END Side Header -->

  <!-- Sidebar Scrolling -->
  <div class="js-sidebar-scroll">
    <!-- Side Actions -->
    <div class="smini-hide">
      <div class="content-side content-side-full bg-body-light">
        <button type="button" class="btn w-100 btn-alt-primary">
          <i class="fa fa-plus opacity-50 me-1"></i> New Project
        </button>
      </div>
    </div>
    <!-- END Side Actions -->

    <!-- Side Navigation -->
    <div class="content-side">
      <ul class="nav-main">
        <li class="nav-main-item">
          <a class="nav-main-link active" href="{{route('dashboard')}}">
            <i class="nav-main-link-icon fa fa-rocket"></i>
            <span class="nav-main-link-name">Dashboard</span>
          </a>
        </li>

        <li class="nav-main-item">
          <a class="nav-main-link" href="{{route('admin.taalim')}}">
            <i class="nav-main-link-icon fa fa-rocket"></i>
            <span class="nav-main-link-name">ta3lim</span>
          </a>
        </li>


        <li class="nav-main-item">
          <a class="nav-main-link" href="{{route('admin.sanawats')}}">
            <i class="nav-main-link-icon fa fa-rocket"></i>
            <span class="nav-main-link-name">sanawats</span>
          </a>
        </li>


        <li class="nav-main-heading">Estimara management</li>
        <li class="nav-main-item open">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
            <i class="nav-main-link-icon fa fa-border-all"></i>
            <span class="nav-main-link-name">Estimara</span>
            </a>
            <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('admin.estimara')}}">
               <span class="nav-main-link-name">list</span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('admin.atelier')}}">
                <span class="nav-main-link-name">Atelier</span>
              </a>
            </li>
            {{-- <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('admin.atelier')}}">
                <span class="nav-main-link-name">Atelier</span>
              </a>
            </li> --}}
          </ul>
          </li>
       
        <li class="nav-main-heading">Dashboards</li>
        <li class="nav-main-item">
          <a class="nav-main-link" href="be_pages_dashboard_all.html">
            <i class="nav-main-link-icon fa fa-arrow-left"></i>
            <span class="nav-main-link-name">Go Back</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- END Side Navigation -->
  </div>
  <!-- END Sidebar Scrolling -->
</nav>