@extends('admin.layouts.app')
@section('style')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">
    <style>
        input:focus{
            border-color: #000;
        }
    </style>
@stop
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
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <h4 class="card-title">current Project List</h4>
                                </div>
                                <div class="col-3 text-end">
                                    <a href="{{ route('admin.currentorder.csv') }}" class="btn btn-primary csv-download">Download Csv File</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="datepicker">Date : </label>
                                    <input id="datepicker" name="date" class="filter">
                                </div>
                                <div class="col-3">
                                    <label for="project">project Name : </label>
                                    <input id="project" name="project" class="filter">
                                </div>
                            </div>
                            <div class="table-responsive pt-3">
                                @include('admin.currentorder.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
        $(document).on('keyup change','.filter',function(){
            var date = $('#datepicker').val();
            var project = $("#project").val();
            var token = $('html').find('meta[name="csrf-token"]');

            $.ajax({
                type:'POST',
                url:'{{route("admin.current.order.filters")}}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "date": date,
                    "project": project,
                },
                success: function(res) {
                    $("#table").remove();
                    $(".table-responsive").append(res);
                },
            });
        });
    </script>
@stop
