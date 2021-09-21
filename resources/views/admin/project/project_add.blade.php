@extends('admin.layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Project </h4>
                    <form class="forms-sample" action="{{ route('admin.project.store') }}" method="post">
                      @csrf
                        <div class="form-group row"> 
                            <label class="col-sm-3 col-form-label">Project Type</label>
                            @foreach($ProjectType as $pt)
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="projectType" id="{{ $pt->type}}" value="{{$pt->id}}" @if($pt->id == '1') checked : "" @endif>
                                  {{ $pt->type}}
                                <i class="input-helper"></i></label>
                              </div>
                            </div>
                            @endforeach
                        </div> 
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="name" placeholder="Name" name="name" Required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="website" class="col-sm-3 col-form-label">Website</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="website" placeholder="Website" name="website" Required> 
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="email" placeholder="Email" name="email" Required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="month" class="col-sm-3 col-form-label">Number Of Months</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="month" placeholder=" Number Of Month" name="month"  min="1" max="12" Required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="price" placeholder="Price" name="price"  Required>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light"><a href="{{ route('admin.project.list') }}" class="text-decoration-none">Cancel</a></button>
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