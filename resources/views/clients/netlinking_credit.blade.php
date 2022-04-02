@extends('clients.layouts.app')
@section('style')
    <style>
        .project_type{
            text-decoration: none;
            color: white;
            background: #5d5be0;
            padding: 8px 15px;
            border-radius: 50px;
        }
        .project_type:hover,.project_type:active{
            color: #5d5be0;
            border: 2px solid #5d5be0;
            background: #fff;
        }
        .card-body .page---head{
            margin-top: 0;
        }
        .page-content{
            box-shadow: 0px 9px 14px -7px #8f8f8f;
            background: #f4f4f4;
            padding: 15px;
            border-radius: 17px;
            display: none;
        }
        .project-type{
            padding: 15px 0;
        }
    </style>
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach ($ProjectList as $type)
                                <div class="page---head">
                                    @foreach ($data as $key => $val)
                                        @foreach ($val as $dt)
                                            @foreach ($dt as $ty)
                                                @php $month = DateTime::createFromFormat('!m', $ty)->format('F') @endphp
                                                <a class="project_type project_month" href="javascript:;" data-year="{{$key}}" data-month={{$month}} data-id="{{$type->id}}">{{ $month }} {{ $key }}</a>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="mt-5 text-center page-content">
                                    <div class="project-type">
                                        <a class="project_type">
                                            {{$type->project_type_checkbox}}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click',".project_month",function(){

            var month = $(this).data('month');
            var year = $(this).data('year');
            $(".page-content").slideDown();
            var tmonth = $('.page-content').attr('data-month');
            var tyear = $('.page-content').attr('data-year');
            console.log(month);
            console.log(year);
            console.log(tmonth);
            console.log(tyear);
            if (($(".page-content").attr('style') == 'display: block;') && (month == tmonth) && (year == tyear)) {
                $(".page-content").slideUp();
            }else{
                $('.page-content').attr('data-month',month);
                $('.page-content').attr('data-year',year);
            }
        });
    </script>
@endsection
