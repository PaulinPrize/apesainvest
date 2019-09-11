@extends('layouts.app')

@section('content')    
    <div id="carouselExampleIndicators" class="carousel slide my-carousel" data-ride="carousel">
        <ol class="carousel-indicators">  
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" >
                <img class="d-block w-100" src="{{asset('public/img/banniere/1.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>STARTUP</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('public/img/banniere/2.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>AGRO-INSDUSTRIE</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('public/img/banniere/2.jpg')}}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Ceci est le titre numéro 3</h1>
                </div>
            </div>          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <P class="titleStyle">Projets en cours<P/>
        <div class="row">
            @foreach($projets as $projet)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="cursor: pointer">
                    <div class="card shadow">
                        <div class="inner">
                            <a href="{{ url('public/img/projets/logo/images/' . $projet->photo_projet) }}" class="image-link">
                                <img src="{{ url('public/img/projets/logo/thumbs/' . $projet->photo_projet)}}" class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center text-uppercase">
                                <a href="{{route('project.details',$projet->id)}}">{{ $projet->nom_du_projet }}</a>
                            </h5>
                            <p class="card-text text-truncate">{{$projet->enonce_du_defi}}</p>
                            <small>
                                {{ $projet->somme_recoltee }} / {{ $projet->somme_a_recolter }} XAF
                            </small>
                            <div class="pull-right">
                                <small>25%</small>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>          
                            </div>
                            <div class="pull-right">
                                <small>
                                    {{ $diff = Carbon\Carbon::parse($projet->date_fin_mise_en_oeuvre)->diffInDays() }}
                                    jour(s)
                                </small>
                            </div>                          
                        </div>
                        <div class="card-footer text-truncate">
                            <small>
                                <img src="{{asset('public/img/avatars/' . $projet->photo. '') }}" style="width:25px;height:25px;border-radius: 50%"/>
                                {{ $projet->name }}
                            </small>
                        </div>
                    </div>
                    <br/>
                </div>
            @endforeach
        </div>
        <br/>
        <div class="d-flex justify-content-center">
            <a href="#" class=" btn btn-lg btn-primary">
                Afficher tous les projets
            </a>
        </div>
        <br/><br/><br/><br/>
        <P class="titleStyle">Secteurs d'investissement<P/>
        <div class="row justify-content-center">
            @foreach($categories as $categorie)
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-center">
                    <a href="#">
                        <img src="{{ url('public/img/categories/' . $categorie->photo_categorie)}}" alt="Image" style="height:100px; width:100px; margin-bottom: 10px" class="rounded-circle">
                        <h6> {{$categorie->nom}}<h6/> 
                    </a>
                </div>
            @endforeach
        </div>
        <br/><br/>
        <div class="d-flex justify-content-center">
            <a href="#" class=" btn btn-lg btn-primary">
                Lancer mon projet
            </a>
        </div>
        <br/><br/><br/><br/>       
    </div>

<!--
           Tout ce qui suit a ete fait par advisor
                 cordialement 
                            -->
    <script>
         $(function(){
           
            /**** action lors du passage de la souris*****/

                $('.card-body').hover(function(){

                     $(this).parent().css('border-color','#90EE90')
                     $(this).parent().children().next().next().css('background-color','#90EE90')   
                })
            /**** action lors du retrait de la souris*****/
                $('.card-body').mouseleave(function(){

                     $(this).parent().css('border-color','')
                     $(this).parent().children().next().next().css('background-color','')  
                })
         });
    </script>
@endsection

