<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item" id="dashboard_tab">
        <a class="nav-link" href="{{ route('client.dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title" >Dashboard</span>
        </a>
      </li>
      <li class="nav-item" id="propject_tab">
        <a class="nav-link" href="{{ route('client.project.show', [auth()->user()->id, '1']) }}">
          <i class="icon-cog menu-icon"></i>
          <span class="menu-title" >Project</span>
        </a>
      </li>
    </ul>
  </nav>