@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top: 34px;">
    <div class="col-sm-12" style="margin-top: 100px;">
      <h1 class="text-center">{{$projet->nom_du_projet}}</h1>
      <h6 class="text-center">Ajouté le {{$projet->created_at}}</h6>
      <h6 class="text-center">{{$projet->categorie->nom}}</h6>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding:15px">
          <img src="{{asset('public/img/projets/logo/images/'. $projet->photo_projet)}}" width="100%" height="100%" alt="image du projet">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding:15px">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-2">
                  <img src="{{asset('public/img/projets/logo/images/'.$projet->photo_projet)}}" width="50" height="50" alt="image de profil" class="image rounded-circle">
                </div>
                <div class="col-lg-10">
                  <a href="#">{{$projet->user->name}}<a><br>Paris
                </div>
              </div>
            </div>
          </div><br>
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-4">
                  <h6><strong>{{$donation}}</strong> <br>Contributeur(s)</h6>
                </div>
                <div class="col-lg-4">
                  <h6><strong>{{ $diff = Carbon\Carbon::parse($projet->date_fin_mise_en_oeuvre)->diffInDays() }}</strong> <br>Jour(s) avant la fin</h6>
                </div>
                <div class="col-lg-4">
                  <h6><strong>{{ $projet->somme_recoltee }} XAF </strong><br>sur {{ $projet->somme_a_recolter }} XAF</h6>
                </div>
              </div>
            </div>
          </div><br><br>
          <div class="row">
            <div class="col-lg-12">
              <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" style="width: {{$pourcentage}}%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">{{$pourcentage}}%
                </div>
              </div>
            </div>
          </div><br>
          <div class="row">
            <div class="col-lg-12">
              <a href="{{route('project.soutenir',[$projet->id,$projet->nom_du_projet])}}" class="btn btn-lg btn-success" style="width:100%">Je soutiens</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding:15px;word-wrap:break-word;">
          <p style="font-family: Times, serif; font-size:14pt; font-style:italic; font-variant: normal">     Objectif:<br>{{$projet->objectifs_du_projet}}
          </p>
          <p style="font-family: Times, serif; font-size:14pt; font-style:italic; font-variant: normal">     Enoncé du défi:<br>{{$projet->enonce_du_defi}}
          </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding:15px">
          <p style="font-family: Times, serif; font-size:14pt; font-style:italic; font-variant: normal; font-weight: bold">Suivre et partager</p>
          <ul class="list-inline">
            <li class="list-inline-item">
              <img src="{{asset('public/svg/facebook.svg')}}" alt="image Facebook" height="60px" width="50px" id="facebook" data-shareurl="{{url()->current()}}" style="cursor: pointer;" />
            </li>
            <li class="list-inline-item">
              <img src="{{asset('public/svg/twitter.svg')}}" alt="image Twitter" height="60px" width="50px" id="twitter"
              data-shareurl="www.apesafund.com" style="cursor: pointer;"/>
            </li>
            <li class="list-inline-item">
              <img src="{{asset('public/svg/linkedin.svg')}}" alt="image Linkedin" height="60px" width="50px" id="linkedin"
                data-shareurl="{{url()->current()}}" style="cursor: pointer;" />
            </li>   
          </ul>
        </div>
      </div>
      @auth
      <div class="row">
        <div class="col-lg-12">
          <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist" style="padding:20px;">
            <li class="nav-item">
              <a class="nav-link active" id="pills-equipe-tab" data-toggle="pill" href="#pills-equipe" role="tab" aria-controls="pills-equipe" aria-selected="true">Equipe de projet</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Documents</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-contributions-tab" data-toggle="pill" href="#pills-contributions" role="tab" aria-controls="pills-contributions" aria-selected="false">Contributions <span class="badge badge-pill badge-success">{{$donation}}</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-commentaires-tab" data-toggle="pill" href="#pills-commentaires" role="tab" aria-controls="pills-commentaires" aria-selected="false">Commentaires <span class="badge badge-pill badge-success">{{$comments}}</span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-equipe" role="tabpanel" aria-labelledby="pills-equipe-tab" style="padding:20px">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Membre</th>
                    <th scope="col">Fonction</th>
                    <th scope="col">Curriculum Vitae</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$projet->membre_un}}</td>
                    <td>{{$projet->fonction_membre_un}}</td>
                    <td>
                      <a href="{{asset('public/img/projets/cv/'.$projet->cv_membre_un)}}">Afficher</a>
                    </td>
                  </tr>
                  <tr>
                    <td>{{$projet->membre_deux}}</td>
                    <td>{{$projet->fonction_membre_deux}}</td>
                    <td><a href="{{asset('public/img/projets/cv/'.$projet->cv_membre_deux)}}">Afficher</a></td>
                  </tr>
                  <tr>
                    <td>{{$projet->membre_trois}}</td>
                    <td>{{$projet->fonction_membre_trois}}</td>
                    <td><a href="{{asset('public/img/projets/cv/'.$projet->cv_membre_trois)}}">Afficher</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" style="padding:20px">
              <ul class="list-group">
                <li class="list-group-item" style="font-weight: bold">
                  Documents
                </li>
                <li class="list-group-item"><a href="{{asset('public/img/projets/planning/'.$projet->planning)}}">Planning du projet</a></li>
                <li class="list-group-item"><a href="{{asset('public/img/projets/resultats_finaux/'.$projet->resultats_finaux)}}">resultats finaux</a></li>
              </ul>
            </div>
            <div class="tab-pane fade" id="pills-contributions" role="tabpanel" aria-labelledby="pills-contributions-tab" style="padding:20px">
              <ul class="list-group">
                <li class="list-group-item" style="font-weight: bold">
                  Contributions
                </li>
                @foreach($last_20_donation as $element)
                  <li class="list-group-item">
                    <div class="media">
                      <img class="mr-3" src="{{asset('public/img/avatars/'. $element->photo)}} " width="40" height="40">
                      <div class="media-body">
                        <h5 class="mt-0">{{$element->name}}</h5>
                        <small style="color: green; font-weight: bold">XAF {{$element->montant}}</small> <br><small>il y'a {{$diff = Carbon\Carbon::parse($element->date)->diffInDays()}} jours</small>
                      </div>
                    </div>
                  </li>
                @endforeach 
              </ul>
            </div>
            <div class="tab-pane fade" id="pills-commentaires" role="tabpanel" aria-labelledby="pills-commentaires-tab" style="padding:20px">
              <ul class="list-group">
                <li class="list-group-item" style="font-weight: bold">
                  Commentaires
                </li>
                @foreach($commentaires as $comments)
                  <li class="list-group-item">
                    <div class="media">
                      <img class="mr-3" src="{{asset('public/img/avatars/'. $comments->photo)}}" width="40" height="40">
                      <div class="media-body">
                        <h5 class="mt-0">{{$comments->name}} </h5>
                        <small>{{$comments->commentaire}}</small>
                      </div>
                    </div>
                  </li>
                @endforeach 
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row" style="padding:18px">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
              <ul class="list-group">
                <li class="list-group-item" style="font-weight: bold">
                  Contributions récentes
                </li>
                @foreach($last_donation as $element)
                  <li class="list-group-item">
                    <div class="media">
                      <img class="mr-3" src="{{asset('public/img/avatars/'. $element->photo)}} " width="40" height="40">
                      <div class="media-body">
                        <h5 class="mt-0">{{$element->name}}</h5>
                        <small style="color: green; font-weight: bold">XAF {{$element->montant}}</small> <br><small style="word-wrap:break-word;">{{$element->commentaire}}. </small><br><small>il y'a {{$diff = Carbon\Carbon::parse($element->date)->diffInDays()}} jours</small>
                      </div>
                    </div>
                  </li>
                @endforeach 
              </ul>
            </div>
          </div>
        </div>
      </div>
      @endauth                    
    </div>

    <script>
     	  $(function(){
           $('#facebook').on('click',function(){
              var shareurl = $(this).data('shareurl');
              window.open('https://www.facebook.com/sharer/sharer.php?u='+escape(shareurl)+'&t='+document.title, '', 
              'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
              return false;
           });

           $('#linkedin').on('click',function(){
            
              var shareurl = $(this).data('shareurl');
              window.open('https://www.linkedin.com/shareArticle?min=true&url='+escape(shareurl)+'&title='+document.title+'&summary=www.apesafund.com', 
              'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');
              return false;
           });


     	  })
     </script>
@endsection

