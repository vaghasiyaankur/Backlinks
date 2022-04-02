<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item" id="dashboard_tab">
        <a class="nav-link" href="{{ route('client.dashboard') }}">
          <!-- <i class="icon-grid menu-icon"></i> -->
          <img src="{{ asset('template/images/icons/dashboard.png')}}" alt="" class="dark-image">
          <img src="{{ asset('template/images/icons/dashboard-white.png')}}" alt=""  class="light-image">
          <span class="menu-title" >Dashboard</span>
        </a>
      </li>
        @isset($project)
            @php
                $project_type = explode(",",$project->project_type_checkbox);
            @endphp
            @foreach ($project_type as $service)
                <li class="nav-item" id="propject_tab">
                    <a class="nav-link" href="@if($service == 'Backlinks'){{ route('client.project.show', [$project->id, '1']) }}@else{{ route('client.project.type',[$project->id,'1',$service]) }}@endif">
                        <!-- <i class="icon-grid m enu-icon"></i> -->
                        <img src="{{ asset('template/images/icons/'.$service.'.png')}}" alt="" class="dark-image">
                        <img src="{{ asset('template/images/icons/'.$service.'-white.png')}}" alt=""  class="light-image">
                        <span class="menu-title" >{{ $service }}</span>
                    </a>
                </li>
            @endforeach
        @endisset

      <li class="nav-item" id="purchase_tab">
        <a class="nav-link" href="{{ route('client.credit.add') }}">
          <!-- <i class="icon-grid menu-icon"></i> -->
          <img src="{{ asset('template/images/icons/Mes-performances-SEO.png')}}" alt="" class="dark-image">
          <img src="{{ asset('template/images/icons/Mes-performances-SEO-white.png')}}" alt=""  class="light-image">
          <span class="menu-title" >Mes performances SEO</span>
        </a>
      </li>
      <li class="nav-item" id="team_tab">
        <a class="nav-link" href="{{ route('client.team.data') }}">
          <!-- <i class="icon-grid menu-icon"></i> -->
          <img src="{{ asset('template/images/icons/group-chat.png')}}" alt="" class="dark-image">
          <img src="{{ asset('template/images/icons/group-chat-white.png')}}" alt=""  class="light-image">
          <span class="menu-title" >Team</span>
        </a>
      </li>
      <li class="nav-item" id="credit_tab">
        <a class="nav-link" href="{{ route('client.credit') }}">
          <!-- <i class="icon-grid menu-icon"></i> -->
          <img src="{{ asset('template/images/icons/credit.png')}}" alt="" class="dark-image">
          <img src="{{ asset('template/images/icons/credit-white.png')}}" alt=""  class="light-image">
          <span class="menu-title" >Credit</span>
        </a>
      </li>
      <li class="nav-item" id="Netlinking_tab">
        <a class="nav-link" href="{{ route('client.netlinking') }}">
          <!-- <i class="icon-grid menu-icon"></i> -->
          <img src="{{ asset('template/images/icons/credit.png')}}" alt="" class="dark-image">
          <img src="{{ asset('template/images/icons/credit-white.png')}}" alt=""  class="light-image">
          <span class="menu-title" >Netlinking Campaign</span>
        </a>
      </li>
    </ul>
  </nav>
