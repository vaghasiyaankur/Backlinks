@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @php
        $serveice = explode(',',$project->project_type_checkbox);
        @endphp
        <div class="row">
        @foreach ($serveice as $serve)
            <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <a href="{{ route('admin.project.show', [$id, '1']) }}" class="card-body text-center py-5  text-decoration-none">
                        <span class="mb-4 text-white">{{ $serve }}</span>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@stop
