<style>
    .sidebar-tab .dropdown-menu.show {
        display: contents !important;
    }
    .nav-item{
        margin: 0;
    }
    .sidebar-tab .dropdown-menu{
        display: none !important;
    }
</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item" id="dashboard_tab">
        <a class="nav-link" href="{{ route('sales.dashboard') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title" >Dashboard</span>
        </a>
      </li>
      <li class="nav-item" id="dashboard_tab">
        <a class="nav-link" href="{{ route('sales.diagostic') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title" >Diagostic</span>
        </a>
      </li>
      <li class="nav-item" id="dictionnaire_tab">
        <a class="nav-link" href="{{ route('sales.dictionnaire') }}">
          <i class="icon-cog menu-icon"></i>
          <span class="menu-title" >Dictionnaire SEO</span>
        </a>
      </li>
    </ul>
  </nav>
