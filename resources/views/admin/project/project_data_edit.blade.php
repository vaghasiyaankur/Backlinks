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
                    @if($errors->any())
                    <div class="card card-inverse-danger mb-2" id="context-menu-multi">
                      <div class="card-body">
                        <p class="card-text">
                          {{$errors->first()}}
                        </p>
                      </div>
                    </div>
                    @endif

                    <form class="forms-sample" action="{{ route('admin.project.data.update') }}" method="post">
                      @csrf
                        <input type="hidden" value="{{$id}}" name="id"/>
                        <input type="hidden" value="{{$month}}" name="month"/>
                        <input type="hidden" value="{{$dataid}}" name="dataid"/>
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Url</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="url" placeholder="Url" name="url" value="{{ $projectdata->url ? $projectdata->url : ''}}" Required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Ancre" class="col-sm-3 col-form-label">Ancre</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="ancre" placeholder="Ancre" name="ancre" value="{{ $projectdata->ancre ? $projectdata->ancre : ''}}"  Required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Url Spot" class="col-sm-3 col-form-label">Url Spot</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="url_spot" placeholder="Url Spot" name="url_spot" value="{{ $projectdata->url_spot ? $projectdata->url_spot : ''}}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Prestataire" class="col-sm-3 col-form-label">Prestataire</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="prestataire" placeholder="Prestataire" name="prestataire" value="{{ $projectdata->prestataire ? $projectdata->prestataire : ''}}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="price" placeholder="Price" name="price"  value="{{ $projectdata->price ? $projectdata->price : ''}}">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                     <a class="btn btn-light" href="{{ route('admin.project.show', [$id, $month] ) }}" class="text-decoration-none">Cancel</a>
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
    $(".nav-item").removeClass('active');
  $("#propject_tab").addClass('active');
 </script>
  @endsection
