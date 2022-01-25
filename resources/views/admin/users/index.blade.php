@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <h3> User </h3>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <h4 class="card-title">User List</h4>
                                </div>
                                <div class="col-3 text-end">
                                    <button class="btn rounded btn-primary"><a href="{{ route('add.users') }}" class="text-white text-decoration-none">Add New Member</a></button>
                                </div>
                            </div>
                            <div class="table-responsive pt-3">
                                @include('admin.users.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#table').dataTable( {
                language: {
                    searchPlaceholder: "Search User"
                }
            });
        });
    </script>
@endsection
