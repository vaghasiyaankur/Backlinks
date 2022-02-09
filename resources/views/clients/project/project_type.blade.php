@extends('clients.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="page---head">
                            <h3>{{ $type }}</h3>
                        </div>
                        <div class="row pt-5">
                            @forelse ($data_project as $project_data)
                                <div class="col-3 mb-5">
                                    <div class="single-audit">
                                    <a href="{{ url('template/images/uploads/'.$project_data->project_file) }}" __target="blank" class="text-decoration-none d-inline-block">
                                        @php
                                            $allowed = array('gif', 'png', 'jpg','jpeg');
                                            $filename = $project_data->project_file;
                                            $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                        @endphp
                                        @if (!in_array($ext, $allowed))
                                        <div class="audit-image">
                                            <img src="{{ asset('template/images/noimage.png') }}" alt="" width="300px" class="border">
                                        </div>
                                        @else
                                        
                                        <div class="audit-image">
                                            <img src="{{ asset('template/images/uploads/'.$project_data->project_file) }}" alt="" width="300px">
                                        </div>
                                        @endif
                                        <div class="image-info position-relative">
                                                <button class="btn btn-primary mt-2">{{ $project_data->project_file }}</button>
                                                <img src="{{ asset('template/images/icons/audit-image.png')}}" alt="">
                                            </div>
                                    </a>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center">No Data Found!!</div>
                            @endforelse
                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="col-lg-12 text-center mb-3">
                                <div class="d-inline-block">
                                    @for ($i = 1; $i <= $datamonths->months; $i++)
                                     <a href="{{ route('client.project.type', [$id,$i,$type])}}" class="btn btn-primary">{{$i}}</a>
                                    @endfor
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
