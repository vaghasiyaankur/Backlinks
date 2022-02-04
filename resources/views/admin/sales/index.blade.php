@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h3>Sales</h3>
                            </div>
                            <form action="{{ route('sales.api.call') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Domain Name</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" name="demain_name" class="form-control" rows="5" placeholder="Domain Name"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="submit" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
