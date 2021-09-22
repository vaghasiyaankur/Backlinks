@extends('clients.layouts.app')
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
              <h4 class="card-title">Project List</h4>
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