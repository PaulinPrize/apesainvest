@extends('layouts.app')  

@section('content')    
    <div class="container" style="margin-top: 34px;">
        <div class="col-sm-12" style="margin-top: 100px;margin-bottom: 100px">
            <div class="row">
                @foreach($projets as $projet)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="cursor: pointer">
                        <div class="card shadow effet">
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
                                    <small>{{ceil(($projet->somme_recoltee/$projet->somme_a_recolter)*100)}}%</small>
                                </div>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ceil(($projet->somme_recoltee/$projet->somme_a_recolter)*100)}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>          
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
        </div>
        <br/>
        <div class="d-flex justify-content-center">
            <button class=" btn btn-lg btn-primary">
                Afficher plus de projets
            </button>
        </div>
        <br/><br/><br/><br/>
    </div>
    <script>
         $(function(){
            /**** action lors du passage de la souris*****/
                
                $('.effet').hover(function(){

                     $(this).css('border-color','#90EE90')
                     $(this).children().next().next().css('background-color','#90EE90')
                })
               
                $('.effet').mouseleave(function(){
                     $(this).css('border-color','')
                     $(this).children().next().next().css('background-color','')
                })
         });
    </script>
@endsection

