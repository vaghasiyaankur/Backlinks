@extends('admin.layouts.app')


@section('style')
<style>
.table_detail{
    width: 100%;
    max-width: 640px;
    margin: 0 auto;
    padding: 60px 0;
}
</style>
@endsection

@section('content')
<div class="table-responsive table_detail">
    <table class="table">
      <thead>
      </thead>
      <tbody>
        <tr>
          <td><b>Url</b></td>
          <td>{{$projectdata->url}}</td>
        </tr>
        <tr>
          <td><b>Ancre</b></td>
          <td>{{$projectdata->ancre}}</td>
        </tr>
        <tr>
          <td><b>Url Spot</b></td>
          <td>{{$projectdata->url_spot}}</td>
        </tr>
        <tr>
          <td><b>Prestataire</b></td>
          <td>{{$projectdata->prestataire}}</td>
        </tr>
        <tr>
          <td><b>Month</b></td>
          <td>{{$project->month}}</td>
        </tr>
        <tr>
          <td><b>Project Name</b></td>
          <td>{{$project->name}}</td>
        </tr>
        <tr>
          <td><b>Project Website</b></td>
          <td>{{$project->website}}</td>
        </tr>
        <tr>
          <td><b>Email</b></td>
          <td>{{$project->email	}}</td>
        </tr>
        <tr>
          <td><b>Total Month</b></td>
          <td>{{$project->month}}</td>
        </tr>
        <tr>
          <td><b>Project Price</b></td>
          <td>{{$project->price}}</td>
        </tr>
        <tr>
          <td><b>Project Type</b></td>
          <td>{{$project->project_type_checkbox}}</td>
        </tr>
        <tr>
          <td><b>Total Price</b></td>
          <td>{{$project->total_price}}</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Line Chart</h4>
        <div class="flot-chart-container">
          <div id="line-chart" class="flot-chart" style="padding: 0px;"><canvas class="flot-base" width="742" height="400" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 742px; height: 400px;"></canvas><canvas class="flot-overlay" width="742" height="400" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 742px; height: 400px;"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text x="205.3125" y="394.5" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: center;">Feb</text><text x="375.49755859375" y="394.5" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: center;">Mar</text><text x="546.97216796875" y="394.5" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: center;">Apr</text><text x="716.52978515625" y="394.5" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: center;">May</text><text x="35.25" y="394.5" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: center;">Jan</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text x="16.599609375" y="365.5" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: right;">0</text><text x="8.7998046875" y="306.8333333333333" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: right;">50</text><text x="1" y="13.5" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: right;">300</text><text x="1" y="248.16666666666666" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: right;">100</text><text x="1" y="189.5" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: right;">150</text><text x="1" y="130.83333333333331" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: right;">200</text><text x="1" y="72.16666666666666" style="position: absolute; font: 400 13px / 15px Nunito, sans-serif; text-align: right;">250</text></g></svg></div></div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script src="https://www.bootstrapdash.com/demo/skydash/template/js/flot-chart.js"></script>
@endsection
