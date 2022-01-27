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
                            @include('clients.team.team_data')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

