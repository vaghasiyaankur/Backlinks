@extends('admin.layouts.app')

@section('style')

<style>
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
  input[type="number"] {
    width: 60px;
}



.gnewsdiv {
  top: 0; right: 0; bottom: 0; left: 0;
  height: 40px;
  /* margin: auto; */
  text-align: center;
}

.spotdiv label{
  margin-right: 10px;
}

#table_filter{
  display: none;
}
.card-body .filters {
  display: flex;
  flex-wrap: wrap
}
.card-body .filters .formtofilter {
  width: 25%;
  margin: 0;
}

/** Switch
 -------------------------------------*/

.gnewslabel input {
  position: absolute;
  opacity: 0;
}

/**
 * 1. Adjust this to size
 */

.gnewslabel {
  display: inline-block;
  font-size: 20px; /* 1 */
  height: 1em;
  width: 2em;
  background: #BDB9A6;
  border-radius: 1em;
}

.gnewslabel div {
  height: 1em;
  width: 1em;
  border-radius: 1em;
  background: #FFF;
  box-shadow: 0 0.1em 0.3em rgba(0,0,0,0.3);
  -webkit-transition: all 300ms;
     -moz-transition: all 300ms;
          transition: all 300ms;
}

.gnewslabel input:checked + div {
  -webkit-transform: translate3d(100%, 0, 0);
     -moz-transform: translate3d(100%, 0, 0);
          transform: translate3d(100%, 0, 0);
}
.gnewsdiv .labelGnews{
  margin-right: 10px;
}

.table td img, .jsgrid .jsgrid-table td img {
  width: 17px;
  height: 17px;
  border-radius: 100%;
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
          <div class="col-lg-2 col-md-2 mb-4">
           <a href="{{ route('admin.spot.list.excel') }}" class="btn btn-primary"> Add SpotList Excel</a>
          </div>

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                    <h4 class="card-title col-9"  >Project List</h4>
                    <a class="btn btn-success mb-3" href="{{ route('admin.spot.list.csv')}}">Download Csv File</a>

                    <button class="btn btn-primary mb-3 show_filter">Show Filter</button>
                    <button class="btn btn-primary mb-3 d-none hide_filter">Hide Filter</button>

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

              <div class="table-responsive pt-3">
                {{-- @yield('table') --}}
                @include('admin.spotlist.table')
                {{-- <table class="table table-bordered" id="table">
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
                      <th>
                        Profile_facebook
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
                      <td>
                        {{$sl->trafic}}
                      </td>
                      <td>
                        {{$sl->gnews}}
                      </td>
                      <td>
                       {{$sl->thematic}}
                      </td>
                      <td>
                        {{$sl->provider}}
                      </td>
                      <td>
                        <a href="{{$sl->profile_facebook}}" target="_blank" style="color:#000; text-decoration:none; "> <i class="fa fa-link"></i></a>

                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table> --}}
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
    $(document).ready(function() {
      $('#table').dataTable( {
        language: {
          searchPlaceholder: "Search Spot"
        }
      });
    });

    $(document).on('keyup change', '.fromfilter, .tofilter, #spot', function(){
      // alert('dsn');
      datatable();
    });

    $(document).on('click', '.dropdown-item', function(){
      $('.dropdown-item').removeClass('select_theme');
      $(this).addClass('select_theme');

      var curr_val = $(this).text();
      $(".dropdown-toggle").text(curr_val);

      datatable();
    });

    $(document).on('change', '#gnews', function(){
      datatable();
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

      // console.log(search);
      // console.log(prix);
      // console.log(trafic);
      // console.log(thematic);
      // console.log(gnews);

    var token = $('html').find('meta[name="csrf-token"]');

    $.ajax({
      type:'POST',
      url:'{{route("admin.spotlist.filters")}}',
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
        $("#table").remove();
        $(".table-responsive").append(res);
      },
    });


    }
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
  </script>
  @endsection
