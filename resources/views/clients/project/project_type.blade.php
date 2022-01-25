@extends('clients.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h3></h3>
                        <div class="row">
                            @foreach ($data_project as $project_data)
                                <div class="col-4">
                                    <img src="{{ asset('template/images/uploads/'.$project_data->project_file) }}" alt="" width="300px">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
