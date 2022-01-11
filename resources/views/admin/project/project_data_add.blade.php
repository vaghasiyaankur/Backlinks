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

                    <form class="forms-sample" action="{{ route('admin.project.data.store') }}" method="post">
                      @csrf
                        <input type="hidden" value="{{$id}}" name="id"/>
                        <input type="hidden" value="{{$month}}" name="month"/>
                      <div class="form-group row align-items-center">
                        <label for="name" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="8" cols="50"  id="url" placeholder="Url" name="url" Required></textarea>
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label for="Ancre" class="col-sm-2 col-form-label">Ancre</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="8" cols="50" id="ancre" placeholder="Ancre" name="ancre" Required> </textarea>
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label for="Url Spot" class="col-sm-2 col-form-label">Url Spot</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="8" cols="50" id="url_spot" placeholder="Url Spot" name="url_spot" Required></textarea>
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label for="Prestataire" class="col-sm-2 col-form-label">Prestataire</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="8" cols="50" id="prestataire" placeholder="Prestataire" name="prestataire" Required></textarea>
                        </div>
                      </div>
                      <div class="form-group row align-items-center">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" rows="8" cols="50" id="price" placeholder="Price" name="price"  Required></textarea>
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
