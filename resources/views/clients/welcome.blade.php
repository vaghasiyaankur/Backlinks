@extends('clients.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
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
        <div class="row">
            @if(isset($project))
                @php
                    $project_type = explode(",",$project->project_type_checkbox);
                @endphp
                @foreach ($project_type as $service)
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <a href="@if($service == 'Backlinks'){{ route('client.project.show', [$project->id, '1']) }}@else{{ route('client.project.type',[$project->id,$service]) }}@endif" class="card-body text-center py-5  text-decoration-none">
                                <span class="mb-4 text-white">{{ $service }}</span>
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ms-1"></i></span>
      </div>
    </footer>
    <!-- partial -->
  </div>

  @endsection
