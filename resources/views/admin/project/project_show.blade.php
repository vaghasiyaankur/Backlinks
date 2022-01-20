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
input[type="number"] {
    width: 60px;
}
a:focus, input:focus{
    border-color: #000;
  }
  div.filters{
    position: relative;
  }
  div.filter1 .formtofilter{
    flex : 0 0 auto;
    width: 20%;
  }

  div.filter2 .dropdown, .gnewsdiv, .spotdiv{
    flex : 0 0 auto;
    width: 25%;
  }
  .formtofilter, .dropdown, .gnewsdiv, .spotdiv{
    display: inline-block;
    margin-right: 100px;
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
                {{-- <a href="{{ route('admin.list.spot') }}" class="btn btn-primary">Spot List</a> --}}
                <button class="btn btn-primary update_url_spot">Update Url Spot</button>
                <button class="btn btn-primary show_filter">Show Filter</button>
                <button class="btn btn-primary d-none hide_filter">Hide Filter</button>
                <button class="btn btn-primary check_website" data-website="{{ $project->website}}">Check Refering Domains</button>
                <a class="btn @if($saved == '1') btn-success @else btn-danger @endif" href="{{ route('admin.project.saved', [$id, $month])}}">save</a>
                <a class="btn btn-primary" href="{{ route('admin.add.data', [$id, $month])}}">Add Project Data</a>
                <span>Budget: {{number_format($project->price/$datamonths->months, 2)}}</span>

                {{-- <div class="filter row mt-4 d-none">
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
                </div> --}}
                <div class="filters filters1 mt-3 mb-4 d-none">
                    <div class="formtofilter">
                    <label for="prixFrom">Prix : </label>
                    <label for="prixFrom" class="prix_label">From</label>
                    <input type="number" name="prixFrom" class="fromfilter" id="prixFrom" />
                    <label for="prixTo" class="prix_label">To</label>
                    <input type="number" name="prixTo"  class="tofilter"  id="prixTo" />
                    </div>

                    <div class="formtofilter">
                    <label for="refFrom">Ref Domain : </label>
                    <label for="refFrom" class="ref_label">Form</label>
                    <input type="number" name="ref" class="fromfilter" id="refFrom" />
                    <label for="refTo" class="ref_label">To </label>
                    <input type="number" name="ref" class="tofilter" id="refTo" />
                    </div>


                    <div class="formtofilter">
                    <label for="trustFrom">Trust Flow : </label>
                    <label for="trustFrom" class="trust_label">From</label>
                    <input type="number" name="trustFrom" class="fromfilter" id="trustFrom" />
                    <label for="trustTo" class="trust_label">To</label>
                    <input type="number" name="trustTo"  class="tofilter"  id="trustTo" />
                    </div>

                    <div class="formtofilter">
                    <label for="citationFrom">Citation Flow : </label>
                    <label for="citationFrom" class="citation_label">Form</label>
                    <input type="number" name="citation" class="fromfilter" id="citationFrom" />
                    <label for="citationTo" class="citation_label">To </label>
                    <input type="number" name="citation" class="tofilter" id="citationTo" />
                    </div>
                </div>

                <div class="filters filters1 mt-3 mb-4 d-none">
                    <div class="formtofilter">
                    <label for="majesticFrom">Majestic Flow : </label>
                    <label for="majesticFrom" class="majestic_label">From</label>
                    <input type="number" name="majesticFrom" class="fromfilter" id="majesticFrom" />
                    <label for="majesticTo" class="majestic_label">To</label>
                    <input type="number" name="majesticTo"  class="tofilter"  id="majesticTo" />
                    </div>

                    <div class="formtofilter">
                    <label for="keywordsFrom">Keywords : </label>
                    <label for="keywordsFrom" class="keywords_label">Form</label>
                    <input type="number" name="keywords" class="fromfilter" id="keywordsFrom" />
                    <label for="keywordsTo" class="keywords_label">To </label>
                    <input type="number" name="keywords" class="tofilter" id="keywordsTo" />
                    </div>


                    <div class="formtofilter">
                    <label for="traficFrom">Trafic : </label>
                    <label for="traficFrom" class="trafic_label">From</label>
                    <input type="number" name="traficFrom" class="fromfilter" id="traficFrom" />
                    <label for="traficTo" class="trafic_label">To</label>
                    <input type="number" name="traficTo"  class="tofilter"  id="traficTo" />
                    </div>
                </div>


                <div class="filters filters2 mt-3 mb-4 d-none">


                    <div class="dropdown">
                    <button class="btn btn-danger btn-lg dropdown-toggle" type="button" id="dropdownMenuSizeButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Thematic
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton1">
                        @foreach($thematic as $th)
                        <span class="dropdown-item"  value="{{ $th->thematic }}">{{ $th->thematic }}</span>
                        @endforeach
                    </div>

                    </div>
                    <div class="gnewsdiv">
                    <label for="gnews" class="labelGnews">Gnews</label>
                    <label class="gnewslabel" for="gnews"><input type="checkbox" name="gnews" id="gnews"/>    <div></div>
                    </label>
                    </div>

                    <div class="spotdiv">

                    <label for="spot" class="spot">Spot</label>
                    <input type="search" name="spot" id="spot" />
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
    var spot_url = [];
    $('#table tbody .url_spot').each(function(item) {
        spot_url.push($(this).text());
    });
    spot_url = spot_url.toString();
    var website = $(this).data('website');
    var token = $('html').find('meta[name="csrf-token"]')
// console.log(token);
    $.ajax({
      type:'POST',
      url:'{{route("admin.project.checkwebsite")}}',
      data: {
        "_token": "{{ csrf_token() }}",
        "website": spot_url
        },
      success: function(res) {
          $(res).each(function(index, number){
            if(this == 1){
                $(".spot_"+index).css('background-color','red');
            }else{
                $(".spot_"+index).css('background-color','green');
            }
          });
      },
    });
  });

  $(document).on('click','.show_filter',function(){
        $('.hide_filter').removeClass('d-none');
        $('.filters').removeClass('d-none');
        $(this).addClass('d-none');
    });

    $(document).on('click','.hide_filter',function(){
        $('.show_filter').removeClass('d-none');
        $('.filters').addClass('d-none');
        $(this).addClass('d-none');
    });

    // $(document).on('keyup change','.filters',function(){
    //     var url = $("#url").val();
    //     var ancre = $("#ancre").val();
    //     var urlspot = $("#urlspot").val();
    //     var prestataire = $("#prestataire").val();
    //     var pricefrom = $("#pricefrom").val();
    //     var priceto = $("#priceto").val();
    //     var id = $("#id").val();
    //     var month = $("#month").val();
    //     var token = $('html').find('meta[name="csrf-token"]');

    //     $.ajax({
    //         type:'POST',
    //         url:'{{route("admin.project.show.filters")}}',
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "url": url,
    //             "ancre": ancre,
    //             "urlspot": urlspot,
    //             "prestataire": prestataire,
    //             "pricefrom": pricefrom,
    //             "priceto": priceto,
    //             "id": id,
    //             "month": month,
    //         },
    //         success: function(res) {
    //             $("#table").remove();
    //             $(".table-responsive").append(res);
    //         },
    //     });
    // });

    $(document).on('keyup change', '.fromfilter, .tofilter, #spot', function(){
        var prixFrom = $("#prixFrom").val();
        var prixTo = $("#prixTo").val();
        var refFrom = $("#refFrom").val();
        var refTo = $("#refTo").val();
        var trustFrom = $("#trustFrom").val();
        var trustTo = $("#trustTo").val();
        var citationFrom = $("#citationFrom").val();
        var citationTo = $("#citationTo").val();
        var majesticFrom = $("#majesticFrom").val();
        var majesticTo = $("#majesticTo").val();
        var keywordsFrom = $("#keywordsFrom").val();
        var keywordsTo = $("#keywordsTo").val();
        var traficFrom = $("#traficFrom").val();
        var traficTo = $("#traficTo").val();
        var spot = $("#spot").val();
        var thematic = $(".select_theme").text();
        var search = $("input[type=seach]").val();

        if ($('#gnews').is(":checked"))
        {
            var gnews = 1;

        }else{
            var gnews = '';
        }

        var token = $('html').find('meta[name="csrf-token"]');

        $.ajax({
            type:'POST',
            url:'{{route("admin.project.show.filters")}}',
            data: {
                "_token": "{{ csrf_token() }}",
                "prixFrom": prixFrom,
                "prixTo": prixTo,
                "prixTo": prixTo,
                "refFrom": refFrom,
                "refTo": refTo,
                "trustFrom": trustFrom,
                "trustTo": trustTo,
                "citationFrom": citationFrom,
                "citationTo": citationTo,
                "majesticFrom": majesticFrom,
                "majesticTo": majesticTo,
                "keywordsFrom": keywordsFrom,
                "keywordsTo": keywordsTo,
                "traficFrom": traficFrom,
                "traficTo": traficTo,
                "thematic": thematic,
                "gnews": gnews,
                "spot" : spot,
                },
            success: function(res) {
                $(res).each(function(index, element){
                    $(`.spot_${index}`).text(element);
                });
            },
        });
    });

    $(document).on("click",".update_url_spot",function(){
        var id = [];
        var spot_url = [];
        $("#table tbody tr").each(function(item){
            id.push($(this).children(".id").text());
            spot_url.push($(this).children(".url_spot").text());
        });
        id = id.toString();
        spot_url = spot_url.toString();
        $.ajax({
            type:'POST',
            url:'{{route("admin.project.show.url-spot")}}',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "spot_url": spot_url,
                },
            success: function(res) {

            },
        });
    });

 </script>
  @endsection
