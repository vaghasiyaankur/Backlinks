@extends('clients.layouts.app')
@section('style')
<style>
.title_project{

  float: left;
  width: 85%;

}
.card .card-body .table-div{
  min-height: 550px;
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
              <h4 class="card-title title_project">Project List</h4>
              <a class="btn btn-success" href="{{ route('client.project.csv', [$id, $month])}}">Download Csv File</a>
              <div class="table-responsive pt-3 table-div">
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
                      <th @if($notexitsdomain == '0') style="background-color:red" @endif>
                        Url Spot
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                   
                    @foreach($projectdata as $pd)
                    <tr>
                      <td>
                        {{$pd->id}}
                      </td>
                      <td>
                       {{$pd->url}}
                      </td>
                      <td>
                      {{$pd->ancre}}
                      </td>
                      <td  @if($notexitsdomain == '0') style="background-color:red" @endif>
                       {{$pd->url_spot}}
                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-12 float-start">
              @for ($i = 1; $i <= $datamonths->months; $i++)
                      <a href="{{ route('client.project.show', [$id, $i])}}" class="btn btn-primary">{{$i}}</a>
             @endfor
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