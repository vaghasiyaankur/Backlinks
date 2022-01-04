@extends('admin.layouts.app')

@section('style')

<style>
  a:focus, input:focus{
    border-color: #000;
  }
  div.filters{
    position: relative;
  }
  .prixtrafic, .dropdown, .gnewsdiv, .spotdiv{
    display: inline-block;
    margin-right: 100px;
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

                    <div class="filters mt-3 mb-4">

                        <div class="prixtrafic">
                          
                          <label for="prix" class="prix">Form Prix</label>
                          <input type="number" name="prix" id="prix" />
                          <label for="trafic" class="trafic">To Trafic</label>
                          <input type="number" name="trafic" id="trafic" />
                        </div>
  
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

    $(document).on('keyup', '#prix, #traficm, #spot', function(){
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
      var prix = $("#prix").val();
      var trafic = $("#trafic").val();
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
        "prix": prix,
        "trafic": trafic,
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
  </script>
  @endsection