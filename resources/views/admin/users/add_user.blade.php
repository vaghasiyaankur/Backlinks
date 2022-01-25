@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add User</h4>
                                @if ($errors->any())
                                    <div class="card card-inverse-danger mb-2" id="context-menu-multi">
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{ $errors->first() }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <form class="forms-sample" action="@if(isset($user_data)){{ route('admin.user.update') }}@else{{ route('admin.user.store') }}@endif" method="post">
                                @csrf
                                    <input type="hidden" name="id" value="@if((isset($user_data)) && ($user_data->id)){{ $user_data->id }}@endif">
                                    <input type="hidden" name="user" value="@if(isset($user_data)){{ $user }}@endif">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="@if((isset($user_data)) && ($user_data->name)){{ $user_data->name }}@endif" Required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="@if((isset($user_data)) && ($user_data->email)){{ $user_data->email }}@endif" Required>
                                        </div>
                                    </div>
                                    @if ((!isset($user_data)) || ((isset($user_data)) && ($user == 'project')))
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Conform Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="c_password" placeholder="Conform Password" name="c_password" Required>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="form-check col-sm-10 px-3">
                                            <input type="checkbox" class="form-check-input m-0" name="administrator" id="administrator" value="administrator" @if((isset($user_data)) && ($user == 'admin')) checked @endif>
                                            <label class="form-check-label" for="administrator">Administrator</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
