@extends('admin.layouts.app')


@section('style')
    <style>
        .check_2_checkbox {
            display: none;
        }
        ..procheckboxmain{
            width: 100%;
        }
        .procheckboxmain .checkbox_div{
            display: inline-block;
        }
        .procheckboxmain .checkbox_div label {
            line-height: normal;
        }
        
    </style>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"> --}}
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Spot </h4>
                                    @if ($errors->any())
                                        <div class="card card-inverse-danger mb-2" id="context-menu-multi">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    {{ $errors->first() }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    <form class="forms-sample" action="{{ route('admin.list.update', $spotlist->id) }}"
                                        method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="spot" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="spot" placeholder="Spot"
                                                    name="spot" value="{{ $spotlist->spot ?: ''}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="prix" class="col-sm-3 col-form-label">Prix</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="prix"
                                                    placeholder="Prix" name="prix" min="1" value="{{ $spotlist->prix ?: ''}}">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="ref_domain" class="col-sm-3 col-form-label">Ref Domain</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="ref_domain"
                                                    placeholder="Ref Domain" name="ref_domain" min="1" value="{{ $spotlist->ref_domain ?: ''}}">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="trust_flow" class="col-sm-3 col-form-label">Trust Flow</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="trust_flow"
                                                    placeholder="Trust Flow" name="trust_flow" min="1" value="{{ $spotlist->trust_flow ?: ''}}">
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <label for="citation_flow" class="col-sm-3 col-form-label">Citation Flow</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="citation_flow"
                                                    placeholder="Citation Flow" name="citation_flow" min="1" value="{{ $spotlist->citation_flow ?: ''}}">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="majestic_flow" class="col-sm-3 col-form-label">Majestic Flow</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="majestic_flow"
                                                    placeholder="Majestic Flow" name="majestic_flow" min="1" value="{{ $spotlist->majestic_flow ?: ''}}">
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <label for="keywords" class="col-sm-3 col-form-label">Keywords</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="keywords"
                                                    placeholder="Keywords" name="keywords" min="1" value="{{ $spotlist->keywords ?: ''}}">
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="trafic" class="col-sm-3 col-form-label">Trafic</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="trafic"
                                                    placeholder="Trafic" name="trafic" min="1" value="{{ $spotlist->trafic ?: ''}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="gnews" class="col-sm-3 col-form-label">Gnews</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="gnews" placeholder="Gnews"
                                                    name="gnews" value="{{ $spotlist->gnews ?: ''}}">
                                            </div>
                                        </div>




                                        <div class="form-group row">
                                            <label for="thematic" class="col-sm-3 col-form-label">Thematic</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="thematic" placeholder="Thematic"
                                                    name="thematic" value="{{ $spotlist->thematic ?: ''}}">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="provider" class="col-sm-3 col-form-label">Provider</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="provider" placeholder="Provider"
                                                    name="provider" value="{{ $spotlist->provider ?: ''}}">
                                            </div>
                                        </div>




                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-light"><a href="{{ route('admin.list.spot') }}"
                                                class="text-decoration-none">Cancel</a></button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
