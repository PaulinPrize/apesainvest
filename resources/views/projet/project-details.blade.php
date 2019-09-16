@extends('layouts.app')

@section('content')
  <div class="container" style="border:1px solid red;margin-top: 33px;">
    <div class="col-sm-12">
      <h1 style="text-align:center">{{$projet->nom_du_projet}}</h1>
      <h6 style="text-align:center">Ajouté le {{$projet->created_at}}</h6>
      <h6 style="text-align:center">{{$projet->categorie->nom}}</h6>
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
                  <h6><strong>2</strong> <br>Contributeur(s)</h6>
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
          <p style="font-family: Times, serif; font-size:14pt; font-style:italic; font-variant: normal">
            {{$projet->objectifs_du_projet}}
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
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Documents</a>
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
      <div class="row" style="border:1px solid purple">
        <div class="col-lg-6" style="border:1px solid yellow">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <h3>Documents</h3>
            </div>
            <div class="tab-pane fade" id="pills-contributions" role="tabpanel" aria-labelledby="pills-contributions-tab">
              <h3>Contributions</h3>
            </div>
            <div class="tab-pane fade" id="pills-commentaires" role="tabpanel" aria-labelledby="pills-commentaires-tab">
              <h3>Commentaires</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row" style="border:1px solid black; padding:20px">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <ul class="list-group">
                @foreach($last_donation as $element)
                  <li class="list-group-item">
                    <div class="media">
                      <img class="mr-3" src="../64x64" width="40" height="40">
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