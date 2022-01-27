@extends('clients.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <h3> Team </h3>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="catd-title">Team List</h4>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('client.team.add') }}" class="btn btn-primary">Add Team Member</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered" id="table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Title</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($team_data as $team)
                                            <tr>
                                                <td><img src="{{ asset('template/images/team/'.$team->image) }}" alt="team-image" style="width:50px;height:50px;"></td>
                                                <td>{{ $team->first_name . " " . $team->last_name }}</td>
                                                <td>{{ $team->title }}</td>
                                                <td>{{ $team->email }} <a href="https://www.linkedin.com/in/{{$team->email}}" target="_blank" rel="noopener"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGyOrgBN_tSzRS0X8G2dBJl6iAJ9T-IWc0-Q&usqp=CAU" alt="Linkedin"></a></td>
                                                <td><a href="{{ route('client.team.edit',[$team->id]) }}" class="btn btn-primary">Edit</a> <a href="{{ route('client.team.delete',[$team->id]) }}" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            @empty
                                                <tr><td colspan="5" class="text-center">No Data Found !!</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
