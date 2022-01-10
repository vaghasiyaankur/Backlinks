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
                    <h4 class="card-title">Add Spot List </h4>
                    @if($errors->any())
                    <div class="card card-inverse-danger mb-2" id="context-menu-multi">
                      <div class="card-body">
                        <p class="card-text">
                          {{$errors->first()}}
                        </p>
                      </div>
                    </div>
                    @endif

                    <form action="{{ route('admin.spot.excel.store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                          
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label> Excel File</label>
                                    <input type="file" class="form-control" value="{{ old('excel') }}" name="excel" required >
                                </div>
                                @error('excel')
                                <span class="invalid-feedback" role="alert">    
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="popup-btn text-left">
                            <a href="{{ route('admin.list.demo') }}" class="btn btn-common btn-primary">Demo</a>
                            </div>
                            <div class="col-md-8">

                                <div class="popup-btn text-center">
                                    <input type="submit"  value="Save" class="btn btn-common btn-primary">
                                    <a href="{{ route('admin.list.spot') }}" class="btn btn-common btn-primary">Cancel</a>
                                </div>
                               
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
</div>

  @endsection

  @section('script')
  <script>
  $("#list_spot_tab").addClass('active');
 </script>
  @endsection