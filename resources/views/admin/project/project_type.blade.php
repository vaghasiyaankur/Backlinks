@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="pb-3">
                    <h3>Project Type</h3>
                </div>
                @php
                $serveice = explode(',',$project->project_type_checkbox);
                @endphp
                <div class="row">
                    @foreach ($serveice as $serve)
                        <div class="col-md-3 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <a href="@if($serve == 'Backlinks'){{ route('admin.project.show', [$id, '1']) }}@else{{ route('admin.project.dropify', [$id,$serve,'1']) }}@endif" class="card-body text-center py-5  text-decoration-none">
                                    <span class="mb-4 text-white">{{ $serve }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
    <script>
        $(document).ready(function(){
            $(".nav-item").removeClass('active');
            $("#propject_tab").addClass('active');
        });
    </script>
@endsection
