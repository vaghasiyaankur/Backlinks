@extends('clients.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h3>Mes performances SEO</h3>
                            </div>
                            <div class="col-12">
                                <form action="{{ route('client.add.credit') }}" method="post" class="my-3">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Domain Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="demain_name" class="form-control" value="@if((isset($project)) && ($project->website)){{ $project->website }}@endif">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <input type="button" class="btn btn-primary" value="Check" @if(($credit == null) || ((isset($credit)) && ($credit->credit_status == 0))) disabled @endif>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="submit" class="btn btn-primary">
                                            @if (($credit == null) || ((isset($credit)) && ($credit->credit_status == 0)))
                                                <button class="btn btn-light"><a href="{{ route('client.credit') }}" class="text-decoration-none">Acheter des crédits</a></button>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
