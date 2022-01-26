@extends('admin.layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
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
                            <input type="submit" class="btn btn-primary mt-3"/>
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="row">
                            @forelse ($dropify as $data_drop)
                                <div class="col-4">
                                    <a href="{{ url('template/images/uploads/'.$data_drop->project_file) }}" __target="blank" class="text-decoration-none">
                                        <img src="{{ asset('template/images/uploads/'.$data_drop->project_file) }}" alt="" width="300px">
                                        <div>
                                            <button class="btn btn-primary mt-2">{{ $data_drop->project_file }}</button>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="text-center">No Data Found!!</div>
                            @endforelse
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
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        })
        $(".nav-item").removeClass('active');
        $("#propject_tab").addClass('active');
    </script>
@stop
