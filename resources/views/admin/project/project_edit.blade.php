@extends('admin.layouts.app')


@section('style')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">
    <style>
        .check_2_checkbox {
            display: none;
        }
        ..procheckboxmain{
            width: 100%;
        }
        .procheckboxmain .checkbox_div{
            display: inline-block;
        }
        .procheckboxmain .checkbox_div label {
            line-height: normal;
        }
        
    </style>

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"> --}}
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

                                    <form class="forms-sample" action="{{ route('admin.project.update', $project->id) }}"
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
                                                                @if ($pt->id == $project->project_type_id) checked : "" @endif>
                                                            {{ $pt->type }}
                                                            <i class="input-helper"></i></label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        {{-- <div class="form-group row select_checkbox check_1_checkbox">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3 procheckboxmain">
                                                <div class="form-check">
                                                    <div>
                                                        <input type="checkbox" class="checkboxes" id="Optimisation de contenus "
                                                            name="projectCheckbox[]" value="Optimisation de contenus " >
                                                        <label for="Optimisation de contenus "> Optimisation de
                                                            contenus</label><br>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" class="checkboxes" id="Rédaction" name="projectCheckbox[]"
                                                            value="Rédaction">
                                                        <label for="Rédaction"> Rédaction</label><br>
                                                    </div>
                                                    <div>
                                                    <input type="checkbox" class="checkboxes" id="Backlinks2" name="projectCheckbox[]"
                                                        value="Backlinks2">
                                                    <label for="Backlinks2"> Backlinks</label><br>
                                                    </div>
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Audit" name="projectCheckbox[]" value="Audit">
                                                    <label for="Audit"> Audit</label>
                                                    </div>
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Intégration" name="projectCheckbox[]"
                                                        value="Intégration">
                                                    <label for="Intégration"> Intégration</label>
                                                    </div>
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Développement" name="projectCheckbox[]"
                                                        value="Développement">
                                                    <label for="Développement">Développement</label>
                                                    </div>
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Coaching" name="projectCheckbox[]"
                                                        value="Coaching">
                                                    <label for="Coaching"> Coaching</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <div class="form-group row select_checkbox check_2_checkbox">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="checkboxes" id="Le client nous envoie son brief "
                                                        name="projectCheckbox[]" value="Le client nous envoie son brief"  @if (in_array('Le client nous envoie son brief', $arraycheckbox)) checked @endif>
                                                    <label for="Le client nous envoie son brief "> Le client nous envoie son
                                                        brief</label><br>
                                                    <input type="checkbox" class="checkboxes" id=" Nous nous occupons du brief"
                                                        name="projectCheckbox[]" value="Nous nous occupons du brief" @if (in_array('Nous nous occupons du brief', $arraycheckbox)) checked @endif>
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
                                            <label for="name" class="col-sm-3 col-form-label">Begining In</label>
                                            <div class="col-sm-9">
                                                  {{-- <select name="begining_month" id="begining_month">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select> --}}
                                                <input id="datepicker" name="begining_month" value="{{ $project->begining_month ? date('m/d/Y', strtotime($project->begining_month)) : ''}}">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" placeholder="Name"
                                                    name="name" value="{{ $project->name ?: ''}}" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="website" class="col-sm-3 col-form-label">Website</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="website" placeholder="Website"
                                                    name="website" value="{{ $project->website ?: ''}}" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="email" placeholder="Email"
                                                    name="email" value="{{ $project->email ?: ''}}" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="month" class="col-sm-3 col-form-label">Number Of Months</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="month"
                                                    placeholder=" Number Of Month" name="month" min="1" max="12" value="{{ $project->month ?: ''}}" Required>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="number_of_backlinks" class="col-sm-3 col-form-label">Number Of Backlinks</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="number_of_backlinks" placeholder="Budget Backlinks"
                                                    name="number_of_backlinks" min="1" value="{{ $project->number_of_backlinks ?: ''}}"  Required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="price" class="col-sm-3 col-form-label">Budget Backlinks</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="price" placeholder="Number of Backlinks"
                                                    name="price" value="{{ $project->price ?: ''}}" Required>
                                            </div>
                                        </div>


                                        {{-- <div class="form-group row">
                                            <label for="refonte" class="col-sm-3 col-form-label">Refonte maillage interne</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="refonte" placeholder="Refonte maillage interne"
                                                    name="refonte" rows="5" Required> {{ $project->refonte ?: ''}}</textarea>
                                            </div>
                                        </div> --}}



                                        <div class="form-group row">
                                            <label for="total_price" class="col-sm-3 col-form-label">Total Price</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="total_price" placeholder="Total Price"
                                                    name="total_price" value="{{ $project->total_price ?: ''}}" Required>
                                            </div>
                                        </div>


                                        <div class="form-group row select_checkbox check_1_checkbox">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-3 procheckboxmain">
                                                <div class="form-check">
                                                    {{-- <div>
                                                        <input type="checkbox" class="checkboxes" id="Optimisation de contenus "
                                                            name="projectCheckbox[]" value="Optimisation de contenus " >
                                                        <label for="Optimisation de contenus "> Optimisation de
                                                            contenus</label><br>
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" class="checkboxes" id="Rédaction" name="projectCheckbox[]"
                                                            value="Rédaction">
                                                        <label for="Rédaction"> Rédaction</label><br>
                                                    </div>
                                                    <div>
                                                    <input type="checkbox" class="checkboxes" id="Backlinks2" name="projectCheckbox[]"
                                                        value="Backlinks2">
                                                    <label for="Backlinks2"> Backlinks</label><br>
                                                    </div> --}}
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Audit" name="projectCheckbox[]" value="Audit"  @if (in_array('Audit', $arraycheckbox)) checked @endif>
                                                    <label for="Audit"> Audit</label>
                                                    </div>
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Intégration" name="projectCheckbox[]"
                                                        value="Intégration"  @if (in_array('Intégration', $arraycheckbox)) checked @endif>
                                                    <label for="Intégration"> Intégration</label>
                                                    </div>
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Développement" name="projectCheckbox[]"
                                                        value="Développement"  @if (in_array('Développement', $arraycheckbox)) checked @endif>
                                                    <label for="Développement">Développement</label>
                                                    </div>
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Coaching" name="projectCheckbox[]"
                                                        value="Coaching"  @if (in_array('Coaching', $arraycheckbox)) checked @endif>
                                                    <label for="Coaching"> Coaching</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row select_checkbox check_1_checkbox">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-6 procheckboxmain">
                                                <div class="form-check">
                                                    <div class="checkbox_div">
                                                        <input type="checkbox" class="checkboxes" id="Optimisation de contenus "
                                                            name="projectCheckbox[]" value="Optimisation de contenus"  @if (in_array('Optimisation de contenus', $arraycheckbox)) checked @endif >
                                                        <label for="Optimisation de contenus "> Optimisation de
                                                            contenus</label>
                                                    </div>
                                                    <div class="checkbox_div">
                                                        <input type="checkbox" class="checkboxes" id="Rédaction" name="projectCheckbox[]"
                                                            value="Rédaction"  @if (in_array('Rédaction', $arraycheckbox)) checked @endif>
                                                        <label for="Rédaction"> Rédaction</label>
                                                    </div>
                                                    <div class="checkbox_div">
                                                    <input type="checkbox" class="checkboxes" id="Backlinks2" name="projectCheckbox[]"
                                                        value="Backlinks2"  @if (in_array('Backlinks2', $arraycheckbox)) checked @endif>
                                                    <label for="Backlinks2"> Backlinks</label>
                                                    </div>

                                                    <div class="checkbox_div">
                                                        <input type="checkbox" class="checkboxes" id="Refonte maillage interne" name="projectCheckbox[]"
                                                            value="Refonte maillage interne"  @if (in_array('Refonte maillage interne', $arraycheckbox)) checked @endif>
                                                        <label for="Refonte maillage interne"> Refonte maillage interne</label>
                                                        </div>
                                                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script>
        $("#propject_tab").addClass('active');


        $(".form-check-input").on('change', function() {
            var id = $(this).val();
            $('.checkboxes').prop('checked', false);
            $(".select_checkbox").hide();
            $(".check_" + id + "_checkbox").css('display','flex');
        });
        $(function() {
        $( "#datepicker" ).datepicker();
        });

    </script>
@endsection
