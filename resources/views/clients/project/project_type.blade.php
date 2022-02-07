@extends('clients.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $type }}</h3>
                        <div class="row">
                            @forelse ($data_project as $project_data)
                                <div class="col-4">
                                    <a href="{{ url('template/images/uploads/'.$project_data->project_file) }}" __target="blank" class="text-decoration-none">
                                        <img src="{{ asset('template/images/uploads/'.$project_data->project_file) }}" alt="" width="300px">
                                        <div>
                                            <button class="btn btn-primary mt-2">{{ $project_data->project_file }}</button>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="text-center">No Data Found!!</div>
                            @endforelse
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12 float-start">
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
@stop
