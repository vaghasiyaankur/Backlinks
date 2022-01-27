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
      <li class="nav-item" id="propject_tab">
        <a class="nav-link" href="{{ route('client.team') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title" >Team</span>
        </a>
      </li>
        @isset($project)
            @php
                $project_type = explode(",",$project->project_type_checkbox);
            @endphp
            @foreach ($project_type as $service)
                <li class="nav-item" id="propject_tab">
                    <a class="nav-link" href="@if($service == 'Backlinks'){{ route('client.project.show', [$project->id, '1']) }}@else{{ route('client.project.type',[$project->id,$service]) }}@endif">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title" >{{ $service }}</span>
                    </a>
                </li>
            @endforeach
        @endisset
    </ul>
  </nav>
