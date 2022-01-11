@extends('admin.layouts.app')
@section('style')
    <style>
        li{
            list-style-type: none;
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
                            <h4 class="card-title">current Project List</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>URL</th>
                                            <th>Ancre</th>
                                            <th class="url_spot">Url Spot</th>
                                            <th>Prestataire</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($project_data as $val)
                                            @if (!($val->projectData)->isEmpty())
                                                <tr>
                                                    <td>{{ $val->name }}</td>
                                                    <td>
                                                    @foreach ($val->projectData as $data)
                                                        <li>{{ $data->url }}</li><br>
                                                    @endforeach
                                                    </td>
                                                    <td>
                                                    @foreach ($val->projectData as $data)
                                                        <li>{{ $data->ancre }}</li><br>
                                                    @endforeach
                                                    </td>
                                                    <td>
                                                    @foreach ($val->projectData as $data)
                                                        <li>{{ $data->url_spot }}</li><br>
                                                    @endforeach
                                                    </td>
                                                    <td>
                                                    @foreach ($val->projectData as $data)
                                                        <li>{{ $data->prestataire }}</li><br>
                                                    @endforeach
                                                    </td>
                                                    <td>
                                                    @foreach ($val->projectData as $data)
                                                        <li>{{ $data->price }}</li><br>
                                                    @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
