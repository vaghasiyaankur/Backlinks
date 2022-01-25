@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Change password</h4>
                                @if ($errors->any())
                                    <div class="card card-inverse-danger mb-2" id="context-menu-multi">
                                        <div class="card-body">
                                            <p class="card-text">
                                                {{ $errors->first() }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <form class="forms-sample" action="{{ route('admin.user.change.password') }}" method="post">
                                @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="hidden" class="form-control" id="id" name="id" value="{{$id}}" Required>
                                            <input type="hidden" class="form-control" id="user" name="user" value="{{$user}}" Required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" Required>
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
