@extends('admin.layouts.app')


@section('style')
    <style>
        .check_2_checkbox {
            display: none;
        }

    </style>
@endsection

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
                                    @if ($errors->any())
                                        <div class="card card-inverse-danger mb-2" id="context-menu-multi">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    {{ $errors->first() }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    <form class="forms-sample" action="{{ route('admin.project.store') }}"
                                        method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Project Type</label>
                                            @foreach ($ProjectType as $pt)
                                                <div class="col-sm-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="projectType"
                                                                id="{{ $pt->type }}" value="{{ $pt->id }}"
                                                                @if ($pt->id == '1') checked : "" @endif>
                                                            {{ $pt->type }}
                                                            <i class="input-helper"></i></label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="form-group row select_checkbox check_1_checkbox">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="checkboxes" id="Optimisation de contenus "
                                                        name="projectCheckbox[]" value="Optimisation de contenus " >
                                                    <label for="Optimisation de contenus "> Optimisation de
                                                        contenus</label><br>
                                                    <input type="checkbox" class="checkboxes" id="Rédaction" name="projectCheckbox[]"
                                                        value="Rédaction">
                                                    <label for="Rédaction"> Rédaction</label><br>
                                                    <input type="checkbox" class="checkboxes" id="Backlinks2" name="projectCheckbox[]"
                                                        value="Backlinks2">
                                                    <label for="Backlinks2"> Backlinks</label><br>
                                                    <input type="checkbox" class="checkboxes" id="Audit" name="projectCheckbox[]" value="Audit">
                                                    <label for="Audit"> Audit</label><br>
                                                    <input type="checkbox" class="checkboxes" id="Intégration" name="projectCheckbox[]"
                                                        value="Intégration">
                                                    <label for="Intégration"> Intégration</label><br>
                                                    <input type="checkbox" class="checkboxes" id="Développement" name="projectCheckbox[]"
                                                        value="Développement">
                                                    <label for="Développement">Développement</label><br>
                                                    <input type="checkbox" class="checkboxes" id="Coaching" name="projectCheckbox[]"
                                                        value="Coaching">
                                                    <label for="Coaching"> Coaching</label><br><br>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group row select_checkbox check_2_checkbox">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="checkboxes" id="Le client nous envoie son brief "
                                                        name="projectCheckbox[]" value="Le client nous envoie son brief ">
                                                    <label for="Le client nous envoie son brief "> Le client nous envoie son
                                                        brief</label><br>
                                                    <input type="checkbox" class="checkboxes" id=" Nous nous occupons du brief"
                                                        name="projectCheckbox[]" value=" Nous nous occupons du brief">
                                                    <label for=" Nous nous occupons du brief"> Nous nous occupons du
                                                        brief</label><br><br>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- <label class="col-sm-3 col-form-label">Project Type</label>
                        <div class="col-sm-3">
                          <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                          <label for="vehicle1"> I have a bike</label><br>
                          <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                          <label for="vehicle2"> I have a car</label><br>
                          <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                          <label for="vehicle3"> I have a boat</label><br><br>

                        </div> --}}



                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" placeholder="Name"
                                                    name="name" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="website" class="col-sm-3 col-form-label">Website</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="website" placeholder="Website"
                                                    name="website" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="email" placeholder="Email"
                                                    name="email" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="month" class="col-sm-3 col-form-label">Number Of Months</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="month"
                                                    placeholder=" Number Of Month" name="month" min="1" max="12" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="price" class="col-sm-3 col-form-label">Price</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="price" placeholder="Price"
                                                    name="price" Required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-light"><a href="{{ route('admin.project.list') }}"
                                                class="text-decoration-none">Cancel</a></button>
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
        $("#propject_tab").addClass('active');


        $(".form-check-input").on('change', function() {
            var id = $(this).val();
            $('.checkboxes').prop('checked', false);
            $(".select_checkbox").hide();
            $(".check_" + id + "_checkbox").css('display','flex');
        });
    </script>
@endsection
