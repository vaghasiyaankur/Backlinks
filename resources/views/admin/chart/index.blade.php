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
    /* background-color: #FF0000; */

}

.gantt__row-bars li.color1{
    background-color: #FF0000;

}

.gantt__row-bars li.color2{
    background-color: #FF8C00;

}
.gantt__row-bars li.color3{
    background-color: #008000;

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
<div class="content-wrapper">
	<div class="gantt">
		<div class="gantt__row gantt__row--months">
			<div class="gantt__row-first"></div>
			<span>Jan</span><span>Feb</span><span>Mar</span>
			<span>Apr</span><span>May</span><span>Jun</span>
			<span>Jul</span><span>Aug</span><span>Sep</span>
			<span>Oct</span><span>Nov</span><span>Dec</span>
		</div>
        @php
            $month = date('m');
        @endphp
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
        {{-- {{dd($ProjectList)}} --}}
        @foreach($ProjectList as $pl)
        <div class="gantt__row">
			<div class="gantt__row-first">
				{{$pl->name}}
			</div>
            {{-- {{ date('m', strtotime($pl->begining_month)) }} --}}
            @php
                $project_type = explode(',', $pl->project_type_checkbox);
                $begining_month = date('m', strtotime($pl->begining_month));
                $total_month = $pl->month + 1;
            @endphp
            {{-- {{dd($type)}}
            {{dd($pl)}} --}}
			<ul class="gantt__row-bars">
                @foreach ($project_type as $type) 
                {{-- {{dump($type)}} --}}
                @if(@$type)
                   {{-- <li class="project_type" style="grid-column: {{$begining_month}}/{{$total_month}}; background-color: #FF0000;" data-color="1">{{$type}}</li> --}}

                   @for ($i = $begining_month; $i < $total_month; $i++)
                   {{-- <option value="{{ $i }}">{{ $i }}</option> --}}
                   <li class="project_type @if(@$pl->$type) color{{$pl->$type}} @else 'color1 @endif" style="grid-column: {{$i}}/{{$i+1}}" data-id="{{$pl->id}}" data-color="1" data-type="{{$type}}">{{$type}}</li>
                   @endfor


                   {{-- <li class="project_type" style="grid-column: 2/3; background-color: #FF0000;" data-color="1">{{$type}}</li> --}}
                   
                @endif
				{{-- <li style="grid-column: 1/12; background-color: #2ecaac;">{{$type}}</li> --}}
                @endforeach
			</ul>
		</div>
        @endforeach

		{{-- <div class="gantt__row">
			<div class="gantt__row-first">
				Barnard Posselt
			</div>
			<ul class="gantt__row-bars">
				<li style="grid-column: 4/11; background-color: #2ecaac;">Even longer project</li>
				<li style="grid-column: 4/11; background-color: #2ecaac;">Even longer project</li>
			</ul>
		</div> --}}
		{{-- <div class="gantt__row gantt__row--empty">
			<div class="gantt__row-first">
				Ryley Huggons
			</div>
			<ul class="gantt__row-bars"></ul>
		</div> --}}
		{{-- <div class="gantt__row">
			<div class="gantt__row-first">
				Lanie Erwin
			</div>
			<ul class="gantt__row-bars">
				<li style="grid-column: 2/5; background-color: #2ecaac;">Start Februar 🙌</li>
				<li style="grid-column: 1/6; background-color: #ff6252;" class="stripes"></li>
				<li style="grid-column: 7/11; background-color: #54c6f9;">Same line</li>
			</ul>
		</div> --}}
		{{-- <div class="gantt__row gantt__row--empty">
			<div class="gantt__row-first">
				Krishnah Pauleit
			</div>
			<ul class="gantt__row-bars"></ul>
		</div>
		<div class="gantt__row gantt__row--empty">
			<div class="gantt__row-first">
				Hobard Lampitt
			</div>
			<ul class="gantt__row-bars"></ul>
		</div> --}}
		{{-- <div class="gantt__row">
			<div class="gantt__row-first">
				Virgilio Jeanes
			</div>
			<ul class="gantt__row-bars">
				<li style="grid-column: 2/5; background-color: #2ecaac;"></li>
			</ul>
		</div> --}}
		{{-- <div class="gantt__row">
			<div class="gantt__row-first">
				Ky Verick
			</div>
			<ul class="gantt__row-bars">
				<li style="grid-column: 3/8; background-color: #54c6f9;">Long project</li>
			</ul>
		</div> --}}
{{-- 
		<div class="gantt__row">
			<div class="gantt__row-first">
				Ketti Waterworth
			</div>
			<ul class="gantt__row-bars">
				<li style="grid-column: 4/9; background-color: #ff6252;" class="stripes">A title</li>
			</ul>
		</div> --}}
	</div>
  @endsection

  @section('script')
  <script>
      $(document).on('click', '.project_type', function(){
        //   if($(this).data('color') == 3){
        //     $(this).css('background-color','#FF0000');
        //     $(this).data('color', 1);
        //   }

        //   if($(this).data('color') == 2){
        //     $(this).css('background-color','#008000');
        //     $(this).data('color', 3);
        //   }
          
          if($(this).data('color') == 1){

            $(this).css('background-color','#FF8C00');
            $(this).data('color', 2);

          }else if($(this).data('color') == 2){

            $(this).css('background-color','#008000');
            $(this).data('color', 3);

          }else if($(this).data('color') == 3){
            $(this).css('background-color','#FF0000');
            $(this).data('color', 1);
          }

		  var id = $(this).data('id');
		  var color_code = $(this).data('color');
		  var type = $(this).data('type');

		  $.ajax({
			type:'POST',
			url:'{{route("admin.chart.changecolor")}}',
			data: {
				"_token": "{{ csrf_token() }}",
				"id" : id,
				"color_code": color_code,
				"type" : type
				},
			success: function(res) {
				if(res == 1){
				 console.log('done'); 
				}
			},
			});



        //   #FF8C00
        // #008000
      })
  </script>
  @endsection