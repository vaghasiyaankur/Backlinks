@extends('admin.layouts.app')
@section('style')
<style>
.title_project{

  float: left;
  width: 60%;

}
.card .card-body .table-div{
  min-height: 550px;
}
</style>
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
 
      <div class="row">
        
          <div class="col-lg-10 col-md-10">
            <h3> Project </h3>
          </div>
        
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title title_project">Project Data List</h4>
                <button class="btn btn-primary check_website" data-website="{{ $project->website}}">Check Refering Domains</button>
                <a class="btn @if($saved == '1') btn-success @else btn-danger @endif" href="{{ route('admin.project.saved', [$id, $month])}}">save</a>
                <a class="btn btn-primary" href="{{ route('admin.add.data', [$id, $month])}}">Add Project Data</a>
                <span>Budget: {{number_format($project->price/$datamonths->months, 2)}}</span>
              <div class="table-responsive pt-3 table-div">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        URL
                      </th>
                      <th>
                        Ancre
                      </th>
                      <th class="url_spot">
                        Url Spot
                      </th>
                      <th>
                        Prestataire 
                      </th>
                      <th>
                        Price
                      </th>
                      <th>
                        Edit
                      </th>
                      {{-- <th>
                        save
                      </th> --}}
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($projectdata as $pd)
                    <tr>
                      <td>
                        {{$pd->id}}
                      </td>
                      <td>
                       {{$pd->url}}
                      </td>
                      <td>
                      {{$pd->ancre}}
                      </td>
                      <td class="url_spot">
                       {{$pd->url_spot}}
                      </td>
                      <td>
                        {{$pd->prestataire}}
                      </td>
                      <td>
                        {{$pd->price}}
                      </td>
                      <td>
                       <a class="btn btn-primary" href="{{ route('admin.edit.data', [$id, $month,$pd->id])}}">Edit</a>
                       <a class="btn btn-danger" href="{{ route('admin.delete.data', [$id, $month,$pd->id])}}">Delete</a>
                       <a class="btn btn-primary" href="{{ route('admin.show.data', [$id, $month,$pd->id])}}">View</a>
                      </td>
                      {{-- <a class="btn btn-primary" href="{{ route('admin.project.show', [$pl->id])}}">Show</a> --}}
                      {{-- <td>
                        <a class="btn btn-success" href="#">save</a> --}}
                        {{-- <a class="btn btn-primary" href="{{ route('admin.project.show', [$pl->id])}}">Show</a> --}}
                       {{-- </td> --}}
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              
              </div>
            </div>
            <div class="col-lg-12 float-start">
            @for ($i = 1; $i <= $datamonths->months; $i++)
                    <a href="{{ route('admin.project.show', [$id, $i])}}" class="btn btn-primary">{{$i}}</a>
           @endfor
            </div>
           
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
 
  </div>

  @endsection

  @section('script')
  <script>

$(".nav-item").removeClass('active');
  $("#propject_tab").addClass('active');

  $(".check_website").click(function(){
    var website = $(this).data('website');
    var token = $('html').find('meta[name="csrf-token"]')
// console.log(token);
    $.ajax({
      type:'POST',
      url:'{{route("admin.project.checkwebsite")}}',
      data: {
        "_token": "{{ csrf_token() }}",
        "website": website
        },
      success: function(res) {
        if(res == 0){
          $(".url_spot").css('background-color','red'); 
        }
      },
    });
  });
 </script>
  @endsection