@extends('admin.layouts.app')

@section('style')
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:100,400,700");

 .gantt {
	 display: grid;
	 border: 0;
	 border-radius: 12px;
	 position: relative;
	 overflow: hidden;
	 box-sizing: border-box;
	 box-shadow: 0 75px 125px -57px #7e8f94;
}
 .gantt__row {
	 display: grid;
	 grid-template-columns: 150px 1fr;
	 background-color: #fff;
}
 .gantt__row:nth-child(odd) {
	 background-color: #f5f5f5;
}
 .gantt__row:nth-child(odd) .gantt__row-first {
	 background-color: #f5f5f5;
}
 .gantt__row:nth-child(3) .gantt__row-bars {
	 border-top: 0;
}
 .gantt__row:nth-child(3) .gantt__row-first {
	 border-top: 0;
}
 .gantt__row--empty {
	 background-color: #ffd6d2 !important;
	 z-index: 1;
}
 .gantt__row--empty .gantt__row-first {
	 border-width: 1px 1px 0 0;
}
 .gantt__row--lines {
	 position: absolute;
	 height: 100%;
	 width: 100%;
	 background-color: transparent;
	 grid-template-columns: 150px repeat(12, 1fr);
}
 .gantt__row--lines span {
	 display: block;
	 border-right: 1px solid rgba(0, 0, 0, 0.1);
}
 .gantt__row--lines span.marker {
	 background-color: rgba(10, 52, 68, 0.13);
	 z-index: 2;
}
 .gantt__row--lines:after {
	 grid-row: 1;
	 grid-column: 0;
	 background-color: #1688b3 45;
	 z-index: 2;
	 height: 100%;
}
 .gantt__row--months {
	 color: #fff;
	 background-color: #0a3444 !important;
	 border-bottom: 1px solid rgba(0, 0, 0, 0.1);
	 grid-template-columns: 150px repeat(12, 1fr);
}
 .gantt__row--months .gantt__row-first {
	 border-top: 0 !important;
	 background-color: #0a3444 !important;
}
 .gantt__row--months span {
	 text-align: center;
	 font-size: 13px;
	 align-self: center;
	 font-weight: bold;
	 padding: 20px 0;
}
 .gantt__row-first {
	 background-color: #fff;
	 border-width: 1px 0 0 0;
	 border-color: rgba(0, 0, 0, 0.1);
	 border-style: solid;
	 padding: 15px 0;
	 font-size: 13px;
	 font-weight: bold;
	 text-align: center;
}
 .gantt__row-bars {
	 list-style: none;
	 display: grid;
	 padding: 9px 0;
	 margin: 0;
	 grid-template-columns: repeat(12, 1fr);
	 grid-gap: 8px 0;
	 border-top: 1px solid rgba(221, 221, 221, 0.8);
}
 .gantt__row-bars li {
	 font-weight: 500;
	 text-align: left;
	 font-size: 14px;
	 min-height: 15px;
	 background-color: #55de84;
	 padding: 5px 12px;
	 color: #fff;
	 overflow: hidden;
	 position: relative;
	 cursor: pointer;
	 border-radius: 20px;
}
 /* .gantt__row-bars li.stripes {
	 background-image: repeating-linear-gradient(45deg, transparent, transparent 5px, rgba(255, 255, 255, .1) 5px, rgba(255, 255, 255, .1) 12px);
} */
.gantt__row-bars li.project_type{
    z-index : 3;
    /* background-color: #f77777; */

}

.gantt__row-bars li.color1{
    background-color: #f77777;

}

.gantt__row-bars li.color2{
    background-color: #f8a744;

}
.gantt__row-bars li.color3{
    background-color: #6bdd6b;

}
 .gantt__row-bars li:before, .gantt__row-bars li:after {
	 content: "";
	 height: 100%;
	 top: 0;
	 z-index: 4;
	 position: absolute;
	 background-color: rgba(0, 0, 0, 0.3);
}
 .gantt__row-bars li:before {
	 left: 0;
}
 .gantt__row-bars li:after {
	 right: 0;
}
 
</style>
@endsection
@section('content')

@php
$month = date('m');
$prev_year = date('Y') - 1;
$currnet_year = date('Y');
$next_year = date('Y') + 1;
@endphp
<div class="d-flex flex-wrap w-100">
<div class="year--button d-flex flex-wrap align-items-center justify-content-between w-100" style="padding: 20px 50px 0">
<button class="year_button btn btn-primary" value="{{$prev_year }}">{{$prev_year }}</button>
<button class="year_button btn btn-success" value="{{$currnet_year }}">{{$currnet_year}}</button>
<button class="year_button btn btn-primary" value="{{$next_year }}">{{$next_year}}</button>
</div>

<div class="content-wrapper" id="{{$prev_year}}" style="display: none">
	<div class="gantt">
		<div class="gantt__row gantt__row--months">
			<div class="gantt__row-first"></div>
			<span>Jan</span><span>Feb</span><span>Mar</span>
			<span>Apr</span><span>May</span><span>Jun</span>
			<span>Jul</span><span>Aug</span><span>Sep</span>
			<span>Oct</span><span>Nov</span><span>Dec</span>
		</div>
		<div class="gantt__row gantt__row--lines" data-month="5">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
        {{-- {{dd($ProjectList)}} --}}
        @foreach($ProjectList as $pl)
        <div class="gantt__row">
			<div class="gantt__row-first">
				{{$pl->name}}
			</div>
            @php
                $project_type = explode(',', $pl->project_type_checkbox);
				$begining_month = @$data[$prev_year][$pl->id][0];
            @endphp

			<ul class="gantt__row-bars">
				@foreach ($project_type as $type)
					@php

						$orangetype = $type.'_orange';
						$orange = explode(',',$pl->$orangetype);

						$greentype = $type.'_green';
						$green = explode(',',$pl->$greentype);
					@endphp
				 	@if(@$type)
							@foreach ($data[$prev_year][$pl->id] as $list)
								
							@php

							$class = 'color1';

							if (in_array($list, $orange)) {
								$class = 'color2';
							}

							if (in_array($list, $green)) {
								$class = 'color3';
							}
								
							@endphp
								<li class="project_type {{$class}}" style="grid-column: {{$list}}/{{$list+1}}" data-id="{{$pl->id}}" data-color="1" data-type="{{$type}}"  data-month="{{$list}}">{{$type}}</li>
							
							@endforeach
                	@endif
                @endforeach
			</ul>
		</div>
        @endforeach
	</div>
</div>	


<div class="content-wrapper" id="{{$currnet_year}}">
	<div class="gantt">
		<div class="gantt__row gantt__row--months">
			<div class="gantt__row-first"></div>
			<span>Jan</span><span>Feb</span><span>Mar</span>
			<span>Apr</span><span>May</span><span>Jun</span>
			<span>Jul</span><span>Aug</span><span>Sep</span>
			<span>Oct</span><span>Nov</span><span>Dec</span>
		</div>
		<div class="gantt__row gantt__row--lines" data-month="5">
			<span></span>
			<span @if($month == 1) class="marker" @endif></span>
			<span @if($month == 2) class="marker" @endif></span>
			<span @if($month == 3) class="marker" @endif></span>
			<span @if($month == 4) class="marker" @endif></span>
			<span @if($month == 5) class="marker" @endif></span>
			<span @if($month == 6) class="marker" @endif></span>
			<span @if($month == 7) class="marker" @endif></span>
			<span @if($month == 8) class="marker" @endif></span>
			<span @if($month == 9) class="marker" @endif></span>
			<span @if($month == 10) class="marker" @endif></span>
			<span @if($month == 11) class="marker" @endif></span>
			<span @if($month == 12) class="marker" @endif></span>
		</div>

        @foreach($ProjectList as $pl)
        <div class="gantt__row">
			<div class="gantt__row-first">
				{{$pl->name}}
			</div>
            @php
                $project_type = explode(',', $pl->project_type_checkbox);
				$begining_month = @$data[$currnet_year][$pl->id][0];
            @endphp

			<ul class="gantt__row-bars">
				@foreach ($project_type as $type)
					@php

						$orangetype = $type.'_orange';
						$orange = explode(',',$pl->$orangetype);

						$greentype = $type.'_green';
						$green = explode(',',$pl->$greentype);
					@endphp
				 	@if(@$type)
							@foreach ($data[$currnet_year][$pl->id] as $list)
								
							@php

							$class = 'color1';

							if (in_array($list, $orange)) {
								$class = 'color2';
							}

							if (in_array($list, $green)) {
								$class = 'color3';
							}
								
							@endphp
								<li class="project_type {{$class}}" style="grid-column: {{$list}}/{{$list+1}}" data-id="{{$pl->id}}" data-color="1" data-type="{{$type}}"  data-month="{{$list}}">{{$type}}</li>
							
							@endforeach
                	@endif
                @endforeach
			</ul>
		</div>
        @endforeach
	</div>
</div>	




<div class="content-wrapper"  id="{{$next_year}}" style="display: none">
	<div class="gantt">
		<div class="gantt__row gantt__row--months">
			<div class="gantt__row-first"></div>
			<span>Jan</span><span>Feb</span><span>Mar</span>
			<span>Apr</span><span>May</span><span>Jun</span>
			<span>Jul</span><span>Aug</span><span>Sep</span>
			<span>Oct</span><span>Nov</span><span>Dec</span>
		</div>
		<div class="gantt__row gantt__row--lines" data-month="5">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>

        @foreach($ProjectList as $pl)
        <div class="gantt__row">
			<div class="gantt__row-first">
				{{$pl->name}}
			</div>
            @php
                $project_type = explode(',', $pl->project_type_checkbox);

				$begining_month = @$data[$next_year][$pl->id][0];
            @endphp

			<ul class="gantt__row-bars">
				@foreach ($project_type as $type)
					@php

						$orangetype = $type.'_orange';
						$orange = explode(',',$pl->$orangetype);

						$greentype = $type.'_green';
						$green = explode(',',$pl->$greentype);
					@endphp
				 	@if(@$type)
							@foreach ($data[$next_year][$pl->id] as $list)
								
							@php

							$class = 'color1';

							if (in_array($list, $orange)) {
								$class = 'color2';
							}

							if (in_array($list, $green)) {
								$class = 'color3';
							}
								
							@endphp
								<li class="project_type {{$class}}" style="grid-column: {{$list}}/{{$list+1}}" data-id="{{$pl->id}}" data-color="1" data-type="{{$type}}"  data-month="{{$list}}">{{$type}}</li>
							
							@endforeach
                	@endif
                @endforeach
			</ul>
		</div>
        @endforeach
	</div>
</div>	
</div>
  @endsection

  @section('script')
  <script>

	  $(document).on('click','.year_button', function(){
		  var value = $(this).val();
		  $('.content-wrapper').hide();
		  $("#"+value).show();


		  $(this).removeClass('btn-primary');
		  $(this).siblings('.year_button').removeClass('btn-success');

		  $(this).addClass('btn-success');
		  $(this).siblings('.year_button').addClass('btn-primary');
	  })
      $(document).on('click', '.project_type', function(){
        //   if($(this).data('color') == 3){
        //     $(this).css('background-color','#f77777');
        //     $(this).data('color', 1);
        //   }

        //   if($(this).data('color') == 2){
        //     $(this).css('background-color','#6bdd6b');
        //     $(this).data('color', 3);
        //   }
          
          if($(this).data('color') == 1){

            $(this).css('background-color','#f8a744');
            $(this).data('color', 2);

          }else if($(this).data('color') == 2){

            $(this).css('background-color','#6bdd6b');
            $(this).data('color', 3);

          }else if($(this).data('color') == 3){
            $(this).css('background-color','#f77777');
            $(this).data('color', 1);
          }

		  var id = $(this).data('id');
		  var color_code = $(this).data('color');
		  var type = $(this).data('type');
		  var month= $(this).data('month');

		  $.ajax({
			type:'POST',
			url:'{{route("admin.chart.changecolor")}}',
			data: {
				"_token": "{{ csrf_token() }}",
				"id" : id,
				"color_code": color_code,
				"type" : type,
				"month" : month
				},
			success: function(res) {
				if(res == 1){
				 console.log('done'); 
				}
			},
			});



        //   #f8a744
        // #6bdd6b
      })
  </script>
  @endsection