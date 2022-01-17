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
                                <form class="forms-sample" action="{{ route('admin.user.store') }}" method="post">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" Required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" Required>
                                        </div>
                                    </div>
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
