@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
 
      <div class="row">
        
          <div class="col-lg-10 col-md-10">
            <h3> Project </h3>
          </div>
          <div class="col-lg-2 col-md-2 mb-4">
           <a href="{{ route('admin.spot.list.excel') }}" class="btn btn-primary"> Add SpotList Excel</a>
          </div>
        
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                    <h4 class="card-title col-9"  >Project List</h4>
                    <a class="btn btn-success" href="{{ route('admin.spot.list.csv')}}">Download Csv File</a>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        Spot
                      </th>
                      <th>
                        Prix
                      </th>
                      <th>
                        Profile_facebook
                      </th>
                      <th>
                        Ref Domain
                      </th>
                      <th>
                        Trust Flow
                      </th>
                      <th>
                        Citation Flow
                      </th>
                      <th>
                        Majestic Flow
                      </th>
                      <th>
                        Keywords
                      </th>
                      <th>
                        Trafic
                      </th>
                      <th>
                        Gnews
                      </th>
                      <th>
                        Thematic
                      </th>
                      <th>
                        Provider
                      </th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($spotlist as $sl)
                    <tr>
                      <td>
                        {{$sl->id}}
                      </td>
                      <td>
                        {{$sl->spot}}
                      </td>
                      <td>
                        {{$sl->prix}}
                      </td>
                      <td>
                        {{$sl->profile_facebook}}
                      </td>
                      <td>
                        {{$sl->ref_domain}}
                      </td>
                      <td>
                        {{$sl->trust_flow}}
                      </td>
                      <td>
                        {{$sl->citation_flow}}
                      </td>
                      <td>
                        {{$sl->majestic_flow}}
                      </td>
                      <td>
                        {{$sl->keywords}}
                      </td>
                      <th>
                        {{$sl->trafic}}
                      </th>
                      <th>
                        {{$sl->gnews}}
                      </th>
                      <th>
                       {{$sl->thematic}}
                      </th>
                      <th>
                        {{$sl->provider}}
                      </th>
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