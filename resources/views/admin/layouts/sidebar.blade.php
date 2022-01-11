<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item" id="dashboard_tab">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title" >Dashboard</span>
        </a>
      </li>
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
    </ul>
  </nav>