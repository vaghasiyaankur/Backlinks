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
                            <div class="row my-5">
                                <div class="text-center">
                                    <h2>Our team</h2>
                                    <div class="d-flex justify-content-center">
                                        <div class="col-6">
                                            <p class="text-dark">Composed of a dozen collaborators passionate about the digital world and especially SEO. We collaborate by investing ourselves day after day in each of your projects to help you build the visibility of your company.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @forelse ($team_data as $team)
                                    <div class="col-4">
                                        <div class="image text-center">
                                            <img src="{{ asset('template/images/team/'.$team->image) }}" alt="team-image" style="width:250px;height:350px;">
                                        </div>
                                        <div class="info text-center mt-3">
                                            <div class="display-4 my-1 text-dark">{{ $team->first_name . " " . $team->last_name }}</div>
                                            <div class="display-5 my-1 text-secondary">{{ $team->title }}</div>
                                            <div class="my-2"><a href="https://www.linkedin.com/in/{{$team->email}}" target="_blank" rel="noopener"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGyOrgBN_tSzRS0X8G2dBJl6iAJ9T-IWc0-Q&usqp=CAU" alt="Linkedin" width="36px" height="36px"></a></div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        No Team Found !!
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
