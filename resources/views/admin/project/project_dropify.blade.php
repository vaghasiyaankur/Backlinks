@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.project.dropify.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="project_file" class="dropify"/>
                            <input type="hidden" name="project_type" value="{{ $type }}">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="month" value="{{ $month }}">
                            <input type="submit" class="btn btn-primary mt-3" onclick="showsuccessatert()"/>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            @forelse ($dropify as $data_drop)
                                <div class="col-4">
                                    <a href="{{ url('template/images/uploads/'.$data_drop->project_file) }}" __target="blank" class="text-decoration-none">
                                        @php
                                            $allowed = array('gif', 'png', 'jpg','jpeg');
                                            $filename = $data_drop->project_file;
                                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (!in_array($ext, $allowed))
                                            <img src="{{ asset('template/images/noimage.png') }}" alt="" width="300px" class="border">
                                        @else
                                            <img src="{{ asset('template/images/uploads/'.$data_drop->project_file) }}" alt="" width="300px">
                                        @endif
                                        <div>
                                            <button class="btn btn-primary mt-2">{{ $data_drop->project_file }}</button>
                                            <a href="{{ route('dropify.delete',[$data_drop->id]) }}" class="btn btn-danger mt-2">Delete</a>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="text-center">No Data Found!!</div>
                            @endforelse
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 float-start">
                            @for ($i = 1; $i <= $datamonths->months; $i++)
                                <a href="{{ route('admin.project.dropify', [$id,$type,$i])}}" class="btn btn-primary">{{$i}}</a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js" integrity="sha512-Y+cHVeYzi7pamIOGBwYHrynWWTKImI9G78i53+azDb1uPmU1Dz9/r2BLxGXWgOC7FhwAGsy3/9YpNYaoBy7Kzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
            $(".nav-item").removeClass('active');
            $("#propject_tab").addClass('active');
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
        showsuccessatert = function(){
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
    </script>
@stop
