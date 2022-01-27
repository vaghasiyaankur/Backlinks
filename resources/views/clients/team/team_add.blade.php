@extends('clients.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">@if(isset($edit_team)) Edit Team @else Add Team @endif </h4>
                                    @if ($errors->any())
                                        <div class="card card-inverse-danger mb-2" id="context-menu-multi">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    {{ $errors->first() }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                    <form action="@if(isset($edit_team)){{ route('client.update.team') }}@else{{ route('client.add.team') }}@endif" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" name="id" value="@if((isset($edit_team)) && ($edit_team->id)){{ $edit_team->id }}@endif">
                                        <div class="form-group row">
                                            <label for="fname" class="col-sm-3 col-form-label">First Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="fname" placeholder="First Name" name="first_name" value="@if((isset($edit_team)) && ($edit_team->first_name)){{ $edit_team->first_name }}@endif" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="last_name" value="@if((isset($edit_team)) && ($edit_team->last_name)){{ $edit_team->last_name }}@endif" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="@if((isset($edit_team)) && ($edit_team->title)){{ $edit_team->title }}@endif" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="image" name="image" Required>
                                                @isset($edit_team)
                                                    <img src="{{ asset('template/images/team/'.$edit_team->image) }}" alt="" class="mt-3">
                                                @endisset
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-light"><a href="{{ route('client.team') }}" class="text-decoration-none">Cancel</a></button>
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
