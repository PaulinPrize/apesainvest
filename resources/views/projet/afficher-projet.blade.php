@extends('adminlte::page')

@section('content')
<div class="container-fluid">
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-sm-12">
        <h1 style="text-align:center">{{$projet->nom_du_projet}}</h1>
        <h5 style="text-align:center">Ajouté le {{$projet->created_at}}</h5>
        <h5 style="text-align:center">({{$projet->categorie->nom}})</h5>
    	<div class="row">
            <div class="col-sm-7" style="border:1px solid yellow;height:356px;word-wrap:break-word;">
                <div class="row" style="border:1px solid green;">
                    <div class="col-sm-12" >
                       <img src="{{asset('public/img/projets/logo/images/'.$projet->photo_projet.'')}}" width="250" height="250">  
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-1 col-sm-4" style="border:1px solid red">
                <div class="row">
                    <div class="col-sm-12" style="border-top:3px solid green; height:356px">
                        <h3>XAF 100</h3>
                        <p >engagé sur un objectif de {{$projet->somme_a_recolter}} XAF</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                10%
                            </div>
                        </div>
                        <h5>2 <br>Contributeur(s)</h5>
                        <h5>10 <br>Jour(s) avant la fin</h5>
                        <button class="btn btn-success btn-md btn-block" type="button"> Contribuer à ce projet</button>
                    </div>
                </div>                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-7" style="height:356px;word-wrap:break-word;">
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">Enoncé du défi</div>
                        <div class="panel-body">
                            {{$projet->enonce_du_defi}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-1 col-sm-4" style="border:1px solid red">
                <div class="row">
                    <div class="col-sm-12" style="border-top:3px solid green; height:356px">
                        <h3>Contributions</h3>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('public/img/avatars/'.Auth::user()->photo.'')}}" class="media-object img-circle" width="40" height="40">
                                    </div>
                                    <div class="media-body">
                                        Nom du contributeur <br>10 000 XAF
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('public/img/avatars/'.Auth::user()->photo.'')}}" class="media-object img-circle" width="40" height="40">
                                    </div>
                                    <div class="media-body">
                                        Nom du contributeur <br>10 000 XAF
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('public/img/avatars/'.Auth::user()->photo.'')}}" class="media-object img-circle" width="40" height="40">
                                    </div>
                                    <div class="media-body">
                                        Nom du contributeur <br>10 000 XAF
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('public/img/avatars/'.Auth::user()->photo.'')}}" class="media-object img-circle" width="40" height="40">
                                    </div>
                                    <div class="media-body">
                                        Nom du contributeur <br>10 000 XAF
                                    </div>
                                </div>
                            </li>
                        </ul>        
                    </div>
                </div>                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-7">
                <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Equipe de projet</h3>
                        </div>
                        <div class="box-body  table-responsive">
                            <table class="table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Fonction</th>
                                        <th>Curriculum Vitae</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$projet->membre_un}}</td>
                                        <td>{{$projet->fonction_membre_un}}</td>
                                        <td>{{$projet->cv_membre_un}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{$projet->membre_deux}}</td>
                                        <td>{{$projet->fonction_membre_deux}}</td>
                                        <td>{{$projet->cv_membre_un}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{$projet->membre_trois}}</td>
                                        <td>{{$projet->fonction_membre_trois}}</td>
                                        <td>{{$projet->cv_membre_un}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_costom.css">
@endsection