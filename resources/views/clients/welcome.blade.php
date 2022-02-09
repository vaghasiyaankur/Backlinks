@extends('clients.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-12">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today ({{ Carbon\Carbon::now()->format('d M Y') }})
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
          <div class="card-body">
            <div class="row">
                @if(isset($project))
                    @php
                        $project_type = explode(",",$project->project_type_checkbox);
                    @endphp
                    @foreach ($project_type as $service)
                        <div class="col-md-3 mb-4 stretch-card transparent card--{{ $loop->iteration }}">
                            <div class="card card-tale">
                                <a href="@if($service == 'Backlinks'){{ route('client.project.show', [$project->id, '1']) }}@else{{ route('client.project.type',[$project->id,'1',$service]) }}@endif" class="card-body text-center py-5  text-decoration-none">
                                    <span class="mb-4">{{ $service }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="my-3 text-center">
                        <p class="display-5">Oops! You are not Found any data.</p>
                    </div>
                @endif
            </div>
          </div>
      </div>
  </div>

  @endsection
@section('script')
    <script>
        $(document).ready(function(){
            if(location.pathname.split("/")[1] == ''){
                $('#dashboard_tab').addClass('active');
            }
        });
    </script>
@endsection
