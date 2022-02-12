@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.title_project{
  float: left;
  width:12%;
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
                <div class="row">
                    <h4 class="card-title title_project">Project Data List</h4>
                    <div class="col-2">{{ $project->note }}</div>
                    {{-- <a href="{{ route('admin.list.spot') }}" class="btn btn-primary">Spot List</a> --}}
                    <div class="col-8">
                        <button class="btn btn-primary update_url_spot">Update Url Spot</button>
                        <button class="btn btn-primary show_filter">Show Filter</button>
                        <button class="btn btn-primary d-none hide_filter">Hide Filter</button>
                        <button class="btn btn-primary check_website" data-website="{{ $project->website}}">Check Refering Domains</button>
                        <a class="project_save btn @if($saved == '1') btn-success @else btn-danger @endif" data-href="{{ route('admin.project.saved', [$id, $month])}}" >save</a>
                        <a class="project_deliver btn @if(!empty($projectdata->toarray()) && ($projectdata[0]->deliver == 1)) btn-success @else btn-danger @endif" data-href="{{ route('admin.project.deliver', [$id, $month])}}">Deliver</a>
                        <a class="btn btn-primary" href="{{ route('admin.add.data', [$id, $month])}}">Add Project Data</a>
                        <span>Budget: {{number_format($project->price/$datamonths->months, 2)}}</span>
                    </div>
                </div>

                <input type="hidden" name="id" id="id" value="{{$id}}">
                <input type="hidden" name="month" id="month" value="{{$month}}">
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
                    <button class="btn btn-danger btn-lg dropdown-toggle thematic" type="button" id="dropdownMenuSizeButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Thematic
                    </button>
                    <div class="dropdown-menu" style="overflow: auto;height: 500px;" aria-labelledby="dropdownMenuSizeButton1">
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
    <div class="jq-toast-wrap top-right">
        <div class="jq-toast-single jq-has-icon jq-icon-success" style="text-align: left; display: none;">
            <span class="jq-toast-loader jq-toast-loaded"></span>
            <span class="close-jq-toast-single">×</span>
            <h2 class="jq-toast-heading">Success</h2>And these were just the basic demos! Scroll down to check further details on how to customize the output.
        </div>
    </div>
  </div>

  @endsection

  @section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" integrity="sha512-Y+cHVeYzi7pamIOGBwYHrynWWTKImI9G78i53+azDb1uPmU1Dz9/r2BLxGXWgOC7FhwAGsy3/9YpNYaoBy7Kzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    $(document).on('click', '.dropdown-item', function(){
      $('.dropdown-item').removeClass('select_theme');
      $(this).addClass('select_theme');

      var curr_val = $(this).text();
      $(".dropdown-toggle.thematic").text(curr_val);
    });

    function datatable(){
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
                $('#table tbody tr .url_spot').text('');
                $('#table tbody tr .provider').text('');
                $('#table tbody tr .price').text('');
                $(res).each(function(index, element){
                    $(`.spot_${index}`).text(element.spot);
                    $(`.provider_${index}`).text(element.provider);
                    $(`.price_${index}`).text(element.prix);
                });
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
            },
        });
    }

    $(document).on("click",".update_url_spot",function(){
        datatable()
    });

    $(document).on("click",".validate_row",function(){
        var url = $(this).data('href');
        var urlspot = $(this).parents('.project_data').children('.url_spot').text();
        var provider = $(this).parents('.project_data').children('.provider').text();
        var price = $(this).parents('.project_data').children('.price').text();
        $.ajax({
            url: url,
            type: 'GET',
            data: {urlspot:urlspot,provider:provider,price:price},
            success: function (res) {
                console.log(res);
            }
        });
    });

    resetToastPosition = function() {
        $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
        $(".jq-toast-wrap").css({
            "top": "",
            "left": "",
            "bottom": "",
            "right": ""
        }); //to remove previous position style
    }

    successalert = function() {
        resetToastPosition();
        $.toast({
            heading: 'Success',
            text: 'Project Data successfully updated.',
            showHideTransition: 'slide',
            icon: 'success',
            loaderBg: '#f96868',
            position: 'top-right'
        })
    }

    dangeralert = function(){
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Danger',
            text: 'Can not find any project data.',
            showHideTransition: 'slide',
            icon: 'error',
            loaderBg: '#f2a654',
            position: 'top-right'
        })
    }

    $(document).on('click','.project_save',function(){
        var url = $(this).data('href');
        $.ajax({
            url:url,
            type:'GET',
            success:function(res){
                if (res == 1) {
                    'use strict';
                    if ($('.project_save').hasClass('btn-success')) {
                        $('.project_save').removeClass('btn-success');
                        $('.project_save').addClass('btn-danger');
                    }else{
                        $('.project_save').removeClass('btn-danger');
                        $('.project_save').addClass('btn-success');
                    }
                    successalert();
                }else{
                    dangeralert();
                }
            }
        });
    });

    $(document).on('click','.project_deliver',function(){
        var url = $(this).data('href');
        $.ajax({
            url:url,
            type:'GET',
            success:function(res){
                if (res == 1) {
                    'use strict';
                    if ($('.project_deliver').hasClass('btn-success')) {
                        $('.project_deliver').removeClass('btn-success');
                        $('.project_deliver').addClass('btn-danger');
                    }else{
                        $('.project_deliver').removeClass('btn-danger');
                        $('.project_deliver').addClass('btn-success');
                    }
                    successalert();
                }else{
                    dangeralert();
                }
            }
        });
    });

 </script>
  @endsection
