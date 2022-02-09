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

          <div class="col-lg-12 col-md-12 mb-5 content-head">
            <div class="page---head">
              <h3> Project </h3>
            </div>
          </div>

          {{-- @if() --}}
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body project__list" style="min-height: 550px">
            <div class="project-list-head d-flex align-items-center justify-content-between">
              <h4 class="card-title title_project mb-0">Project List</h4>
              <a class="btn btn-success" href="{{ route('client.project.csv', [$id, $month])}}">Download Csv File</a>
            </div>
              <div class="table-responsive pt-3 table-div ">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>
                        URL
                      </th>
                      <th>
                        Ancre
                      </th>
                      <th @if($notexitsdomain == '0') style="background-color:#F5F7F9" @endif>
                        Url Spot
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    @forelse($projectdata as $pd)
                    <tr>
                      <td class="text-center">
                        {{$pd->id}}
                      </td>
                      <td>
                       {{$pd->url}}
                      </td>
                      <td>
                      {{$pd->ancre}}
                      </td>
                      <td  @if($notexitsdomain == '0') style="background-color:#F5F7F9" @endif>
                       {{$pd->url_spot}}
                      </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Data Found !!</td>
                        </tr>
                    @endforelse

                  </tbody>
                </table>
              </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-lg-12 text-center mb-5">
                    <div class="d-inline-block">
                      @if($datamonths != '')
                        @for ($i = 1; $i <= $datamonths->months; $i++)
                                <a href="{{ route('client.project.show', [$id, $i])}}" class="btn btn-primary">{{$i}}</a>
                        @endfor
                      @endif
                    </div>
                  </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->

  </div>

  @endsection

