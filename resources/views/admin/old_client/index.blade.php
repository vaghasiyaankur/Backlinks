@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

      <div class="row">

          <div class="col-lg-10 col-md-10">
            <h3> Old Client </h3>
          </div>
          <div class="col-lg-2 col-md-2 mb-4">
           <a href="{{ route('admin.project.add') }}" class="btn btn-primary"> Add New Project</a>
          </div>

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Old Client List</h4>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Website</th>
                      <th>Email</th>
                      <th>Number of Month</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($project as $pl)
                    <tr>
                      <td>{{$pl->id}}</td>
                      <td>{{$pl->name}}</td>
                      <td>{{$pl->website}}</td>
                      <td>{{$pl->email}}</td>
                      <td>{{$pl->month}}</td>
                      <td>{{$pl->price}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->

  </div>

  @endsection
  @section('script')
  <script>
      $(document).ready(function(){
          $(".nav-item").removeClass('active');
          $("#old_client_tab").addClass('active');
      });
  </script>
@endsection
