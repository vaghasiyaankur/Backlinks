@extends('admin.layouts.app')
@section('style')
<style>
.title_project{

  float: left;
  width: 85%;

}
</style>
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
 
      <div class="row">
        
          <div class="col-lg-10 col-md-10">
            <h3> Project </h3>
          </div>
        
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title title_project">Project Data List</h4>
                <a class="btn btn-primary" href="{{ route('admin.add.data', [$id, $month])}}">Add Project Data</a>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        URL
                      </th>
                      <th>
                        Ancre
                      </th>
                      <th>
                        Url Spot
                      </th>
                      <th>
                        Prestataire 
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Edit
                      </th>
                      <th>
                        save
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                       1
                      </td>
                      <td>
                      1
                      </td>
                      <td>
                       1
                      </td>
                      <td>
                        1
                      </td>
                      <td>
                        1
                      </td>
                      <td>
                       <a class="btn btn-primary" href="#">Edit</a>
                       {{-- <a class="btn btn-primary" href="{{ route('admin.project.show', [$pl->id])}}">Show</a> --}}
                      </td>
                      <td>
                        <a class="btn btn-success" href="#">save</a>
                        {{-- <a class="btn btn-primary" href="{{ route('admin.project.show', [$pl->id])}}">Show</a> --}}
                       </td>
                    </tr>
                   
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-2 float-start">
                <button class="btn btn-primary">Month</button>
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
  $("#propject_tab").addClass('active');
 </script>
  @endsection