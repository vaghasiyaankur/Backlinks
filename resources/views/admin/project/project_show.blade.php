@extends('admin.layouts.app')
@section('style')
<style>
.title_project{

  float: left;
  width: 50%;

}
.card .card-body .table-div{
  min-height: 550px;
}
input:focus{
    border-color: #000;
}
input[type="number"] {
    width: 60px;
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
                <button class="btn btn-primary show_filter">Show Filter</button>
                <button class="btn btn-primary d-none hide_filter">Hide Filter</button>
                <button class="btn btn-primary check_website" data-website="{{ $project->website}}">Check Refering Domains</button>
                <a class="btn @if($saved == '1') btn-success @else btn-danger @endif" href="{{ route('admin.project.saved', [$id, $month])}}">save</a>
                <a class="btn btn-primary" href="{{ route('admin.add.data', [$id, $month])}}">Add Project Data</a>
                <span>Budget: {{number_format($project->price/$datamonths->months, 2)}}</span>

                <div class="filter row mt-4 d-none">
                    <div class="col-4">
                        <label for="url">Url : </label>
                        <input type="text" name="url" id="url" class="filters">
                    </div>
                    <div class="col-4">
                        <label for="ancre">Ancre : </label>
                        <input type="text" name="ancre" id="ancre" class="filters">
                    </div>
                    <div class="col-4">
                        <label for="urlspot">Url Spot : </label>
                        <input type="text" name="urlspot" id="urlspot" class="filters">
                    </div>
                </div>
                <div class="filter row mt-4 d-none">
                    <div class="col-4">
                        <label for="prestataire">Prestataire : </label>
                        <input type="text" name="prestataire" id="prestataire" class="filters">
                    </div>
                    <div class="col-4">
                        <label for="pricefrom">Price : </label>
                        <label for="pricefrom">From : </label>
                        <input type="number" name="pricefrom" id="pricefrom" class="filters">
                        <label for="priceto">To : </label>
                        <input type="number" name="priceto" id="priceto" class="filters">
                        <input type="hidden" name="id" id="id" value="{{ Request::segment(4) }}">
                        <input type="hidden" name="month" id="month" value="{{ Request::segment(5) }}">
                    </div>
                </div>
                <div class="table-responsive pt-3 table-div">
                    @include('admin.project.table')
                </div>
            </div>
            <div class="col-lg-12 float-start">
            @for ($i = 1; $i <= $datamonths->months; $i++)
                    <a href="{{ route('admin.project.show', [$id, $i])}}" class="btn btn-primary">{{$i}}</a>
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
$(".nav-item").removeClass('active');
$("#propject_tab").addClass('active');


  $(".check_website").click(function(){
    var website = $(this).data('website');
    var token = $('html').find('meta[name="csrf-token"]')
// console.log(token);
    $.ajax({
      type:'POST',
      url:'{{route("admin.project.checkwebsite")}}',
      data: {
        "_token": "{{ csrf_token() }}",
        "website": website
        },
      success: function(res) {
        if(res == 0){
          $(".url_spot").css('background-color','red');
        }
      },
    });
  });

    $(document).on('click','.show_filter',function(){
        $('.hide_filter').removeClass('d-none');
        $('.filter').removeClass('d-none');
        $(this).addClass('d-none');
    });

    $(document).on('click','.hide_filter',function(){
        $('.show_filter').removeClass('d-none');
        $('.filter').addClass('d-none');
        $(this).addClass('d-none');
    });

    $(document).on('keyup change','.filters',function(){
        var url = $("#url").val();
        var ancre = $("#ancre").val();
        var urlspot = $("#urlspot").val();
        var prestataire = $("#prestataire").val();
        var pricefrom = $("#pricefrom").val();
        var priceto = $("#priceto").val();
        var id = $("#id").val();
        var month = $("#month").val();
        var token = $('html').find('meta[name="csrf-token"]');

        $.ajax({
            type:'POST',
            url:'{{route("admin.project.show.filters")}}',
            data: {
                "_token": "{{ csrf_token() }}",
                "url": url,
                "ancre": ancre,
                "urlspot": urlspot,
                "prestataire": prestataire,
                "pricefrom": pricefrom,
                "priceto": priceto,
                "id": id,
                "month": month,
            },
            success: function(res) {
                $("#table").remove();
                $(".table-responsive").append(res);
            },
        });
    });

 </script>
  @endsection
