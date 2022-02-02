<style>
    .nav-item .dropdown-menu.show {
        display: contents;
    }
    .nav-item{
        margin: 0;
    }
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item" id="dashboard_tab">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title" >Dashboard</span>
        </a>
      </li>
      <li class="nav-item" id="user_tab">
        <a class="nav-link" href="{{ route('admin.user') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title" >User</span>
        </a>
      </li>
      <li class="dropdown nav-item">
          <a class="nav-link dropdown-toggle" id="dropdownMenuprod" href="#" data-bs-toggle="dropdown" aria-haspopup="true" @if ((Request::segment(2) == 'project') || (Request::segment(2) == 'spot-list') || (Request::segment(2) == 'chart') || (Request::segment(2) == 'currentorder') || (Request::segment(2) == 'old-project')) aria-expanded="true" @else aria-expanded="false" @endif>
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title" >Prod</span>
          </a>
          <ul class="dropdown-menu nav @if ((Request::segment(2) == 'project') || (Request::segment(2) == 'spot-list') || (Request::segment(2) == 'chart') || (Request::segment(2) == 'currentorder') || (Request::segment(2) == 'old-project')) show @endif" aria-labelledby="dropdownMenuprod" role="menu">
            <li class="nav-item" id="propject_tab">
              <a class="nav-link" href="{{ route('admin.project.list') }}">
                <i class="icon-cog menu-icon"></i>
                <span class="menu-title" >Project</span>
              </a>
            </li>
            <li class="nav-item" id="list_spot_tab">
              <a class="nav-link" href="{{ route('admin.list.spot') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title" >Liste des Spots</span>
              </a>
            </li>

            <li class="nav-item" id="chart_tab">
              <a class="nav-link" href="{{ route('admin.chart.list') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title" >Task Manager</span>
              </a>
            </li>

            <li class="nav-item" id="current_tab">
              <a class="nav-link" href="{{ route('admin.current.order') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title" >Current BL orders</span>
              </a>
            </li>

            <li class="nav-item" id="old_client_tab">
              <a class="nav-link" href="{{ route('admin.old.client') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title" >Old Clients</span>
              </a>
            </li>
          </ul>
      </li>
    </ul>
  </nav>
