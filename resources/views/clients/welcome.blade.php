@extends('clients.layouts.app')
@section('style')
    <style>
        .modal-dialog {
            max-width: 70%;
        }
        .model-close {
            text-align: end;
            margin: -10px;
        }
        .modal .modal-dialog .modal-content .modal-body {
            padding: 30px 26px;
        }
        button.close {
            border-radius: 50%;
            color: white;
            background: #3d3c68;
            border: 0;
            padding: 5px 10px;
        }
        .modal-body p{
            font-size: 16px;
        }
    </style>
@endsection
@section('content')
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
          <div class="model-close">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        <div class="modal-body">
            <div class="text-center mb-4">
                <img src="{{ asset('template/images/impulsion.png') }}" alt="impulsion-logo" width="">
                <p class="text-center mt-2">L’agence SEO à l’écoute de vos besoins.</p>
            </div>
            <p>En choisissant Impulsion SEO, vous accéderez à une agence à taille humaine aspirant à vous offrir une expertise SEO de grande qualité.</p>
            <p>Composée d’une dizaine de collaborateurs, nous sommes à l’écoute de vos envies. Fini de devoir passer par une multitude de services avant d’accéder à la réactivité dont vous avez besoin.</p>
            <p>Notre objectif est de vous accompagner avec des solutions sur-mesure pour vous permettre d’atteindre vos objectifs en termes de visibilité et de chiffre d’affaires. Votre satisfaction est notre priorité, pour cela nous vous proposons une multitude de solutions, on-site, netlinking, veille concurrentielle, ou encore formation et coaching.</p>
            <p>Avec plus de 9 ans d’expérience dans le SEO et l’édition de site, Romain Pirotte, le fondateur de l’agence a su transmettre son savoir à ses collaborateurs de façon à propulser l’agence au sommet. </p>
            <p class="border-bottom pb-3 border-dark">Notre collaboration repose sur 3 piliers principaux, <b>l’identification</b> de vos besoins pour établir ensemble la meilleure stratégie pour votre business. La <b>mise en place</b> de la stratégie choisie avec une communication active chaque mois avec <b>honnêteté</b> sur vos résultats.</p>
            <h4 class="mt-3">Les valeurs d’Impulsion SEO :</h4>
            <p>Chez Impulsion-SEO, nous croyons et nous nous reposons sur quatre valeurs qui accompagnent au quotidien la société auprès de nos clients et de nos collaborateurs.</p>
            <ul>
                <li>L’<b>expertise</b> que nous fournissons</li>
                <li>La <b>transparence</b> face aux différentes situations que nous pouvons rencontrer</li>
                <li>L’<b>écoute</b>, primordiale pour sʼaméliorer et devenir meilleur</li>
                <li>La <b>loyauté</b> sur nos engagements</li>
            </ul>
            <p class="border-bottom pb-3 border-dark">Ces valeurs fondamentales et l’ensemble des aspects quʼelles recouvrent ont fait lʼobjet dʼune large réflexion à travers nos collaborateurs.</p>
            <p>Vous venez de nous rejoindre. Découvrez sans attendre ce que nous vous préparons. Ici vous pourrez retrouver toutes les ressources nécessaires au suivi de notre collaboration.</p>
        </div>
      </div>

    </div>
  </div>
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-12">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                 <i class="mdi mdi-calendar"></i> Today ({{ Carbon\Carbon::now()->format('d M Y') }})
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                  <a class="dropdown-item" href="#">January - March</a>
                  <a class="dropdown-item" href="#">March - June</a>
                  <a class="dropdown-item" href="#">June - August</a>
                  <a class="dropdown-item" href="#">August - November</a>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
          <div class="card-body">
            <div class="row">
                @if(isset($project))
                    @php
                        $project_type = explode(",",$project->project_type_checkbox);
                    @endphp
                    @foreach ($project_type as $service)
                        <div class="col-md-3 mb-4 stretch-card transparent card--{{ $loop->iteration }}">
                            <div class="card card-tale">
                                <a href="@if($service == 'Backlinks'){{ route('client.project.show', [$project->id, '1']) }}@else{{ route('client.project.type',[$project->id,'1',$service]) }}@endif" class="card-body text-center py-5  text-decoration-none">
                                    <span class="mb-4">{{ $service }}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="my-3 text-center">
                        <p class="display-5">Oops! You are not Found any data.</p>
                    </div>
                @endif
            </div>
          </div>
      </div>
  </div>

  @endsection
@section('script')
    <script>
        $(document).ready(function(){
            if(location.pathname.split("/")[1] == ''){
                $('#dashboard_tab').addClass('active');
            }
            $('#myModal').modal('show');
        });
        $(document).on('click','.close',function(){
            $('#myModal').modal('hide');
        });
    </script>
@endsection
