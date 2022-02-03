@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

      <div class="row">

          <div class="col-lg-10 col-md-10">
            <h3> Project </h3>
          </div>
          <div class="col-lg-2 col-md-2 mb-4">
           <a href="{{ route('admin.project.add') }}" class="btn btn-primary"> Add New Project</a>
          </div>

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Project List</h4>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Website
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Number of Month
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Show Project
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ProjectList as $pl)
                    <tr>
                      <td>
                        {{$pl->id}}
                      </td>
                      <td>
                        {{$pl->name}}
                      </td>
                      <td>
                        @php
                            $website = explode(" ",$pl->website)
                        @endphp
                        @foreach ($website as $web)
                            {{$web}}@if(!$loop->last) <br><br> @endif
                        @endforeach
                      </td>
                      <td>
                        {{$pl->email}}
                      </td>
                      <td>
                        {{$pl->month}}
                      </td>
                      <td>
                        {{$pl->price}}
                      </td>
                      <td>
                       <a class="btn btn-primary" href="@if(empty($pl->project_type_checkbox)){{ route('admin.project.show', [$pl->id, '1']) }}@else{{ route('admin.project.show.dashboard', [$pl->id, '1']) }}@endif">Show</a>
                       <a class="btn btn-danger" href="{{ route('admin.project.delete', $pl->id)}}">Delete</a>
                       <a class="btn btn-primary" href="{{ route('admin.project.edit', $pl->id)}}">Edit</a>
                       <a href="{{ route('admin.project.status',[$pl->id]) }}" class="btn btn-primary me-2">Finish</a>
                      </td>
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
          $("#propject_tab").addClass('active');
      });
  </script>
@endsection
