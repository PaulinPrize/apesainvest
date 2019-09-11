@extends('adminlte::page')

@section('content')
<div class="container-fluid">
    @if (session('status'))  
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-sm-12">
        <br>
        <form name="basicform" id="basicform" method="POST" action="{{ route('projet.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div id="sf1" class="frm">
                <legend>Étape 1 sur 5 </legend>
                <h3 style="text-align:center">Commençez par créer votre projet</h3>
                <h5 style="text-align:center">Choisissez une catégorie de projet. Ce paramètre reste modifiable plus tard.</h5>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <label for="categorie_id" class="control-label">Catégorie du projet *</label>
                        <select id="categorie_id" name="categorie_id" class="form-control">
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <button class="btn btn-success open1 pull-right" type="button">Identification du projet <span class="fa fa-arrow-right"></span></button>
                    </div>
                </div>
            </div>
            <div id="sf2" class="frm" style="display: none;">
                <legend>Étape 2 sur 5 </legend>
                <h3 style="text-align:center">Décrivez brièvement votre projet</h3>
                <h5 style="text-align:center">Ne vous inquiétez pas, c'est modifiable plus tard.</h5>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <label for="nom_du_projet" class="control-label">Nom du projet *</label>
                        {!! Form::text('nom_du_projet', null, ['class' => 'form-control', 'id' => 'nom_du_projet']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <label for="photo_projet" class="control-label">Photo/Logo *</label>
                        <input type="file" name="photo_projet" class="form-control" id="photo_projet">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <label for="enonce_du_defi" class="control-label">Enoncé du défi *</label>
                        <textarea class="form-control" name="enonce_du_defi" rows="6" id="enonce_du_defi"></textarea>
                    </div> 
                </div>  
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Catégorie</button> 
                        <button class="btn btn-success open2 pull-right" type="button">Objectifs du projet <span class="fa fa-arrow-right"></span></button>
                    </div>
                </div>
            </div>
            <div id="sf3" class="frm" style="display: none;">
                <legend>Étape 3 sur 5 </legend>
                <h3 style="text-align:center">Quels sont les principaux objectifs de votre projet</h3>
                <h5 style="text-align:center">Ne vous inquiétez pas, c'est modifiable plus tard.</h5>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <label for="objectifs_du_projet" class="control-label">Objectifs du projet *</label>
                        <textarea class="form-control" name="objectifs_du_projet" rows="6" id="objectifs_du_projet"></textarea>
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <label for="somme_a_recolter" class="control-label">Somme à recolter *</label>
                        {!! Form::number('somme_a_recolter', null, ['class' => 'form-control', 'id' => 'somme_a_recolter']) !!}
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Identification du projet</button> 
                        <button class="btn btn-success open3 pull-right" type="button">Equipe du projet <span class="fa fa-arrow-right"></span></button>
                    </div>
                </div>
            </div>
            <div id="sf4" class="frm" style="display: none;">
                <legend>Étape 4 sur 5 </legend>
                <h3 style="text-align:center">Quelle est l'équipe dirigeante du projet</h3>
                <h5 style="text-align:center">Ne vous inquiétez pas, c'est modifiable plus tard.</h5>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="membre_un" class="control-label">Membre 1 *</label>
                        {!! Form::text('membre_un', null, ['class' => 'form-control', 'id' => 'membre_un']) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fonction_membre_un" class="control-label">Fonction *</label>
                        {!! Form::text('fonction_membre_un', null, ['class' => 'form-control', 'id' => 'fonction_membre_un']) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cv_membre_un" class="control-label">CV *</label>
                        <input type="file" name="cv_membre_un" class="form-control" id="cv_membre_un">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="membre_deux" class="control-label">Membre 2 *</label>
                        {!! Form::text('membre_deux', null, ['class' => 'form-control', 'id' => 'membre_deux']) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fonction_membre_deux" class="control-label">Fonction *</label>
                        {!! Form::text('fonction_membre_deux', null, ['class' => 'form-control', 'id' => 'fonction_membre_deux']) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cv_membre_deux" class="control-label">CV *</label>
                        <input type="file" name="cv_membre_deux" class="form-control" id="cv_membre_deux">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="membre_trois" class="control-label">Membre 3 *</label>
                        {!! Form::text('membre_trois', null, ['class' => 'form-control', 'id' => 'membre_trois']) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fonction_membre_trois" class="control-label">Fonction *</label>
                        {!! Form::text('fonction_membre_trois', null, ['class' => 'form-control', 'id' => 'fonction_membre_trois']) !!}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cv_membre_trois" class="control-label">CV *</label>
                        <input type="file" name="cv_membre_trois" class="form-control" id="cv_membre_trois">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Objectifs du projet</button> 
                        <button class="btn btn-success open4 pull-right" type="button">Etapes & planning <span class="fa fa-arrow-right"></span></button>
                    </div>
                </div>
            </div>
            <div id="sf5" class="frm" style="display: none;">
                <legend>Étape 5 sur 5 </legend>
                <h3 style="text-align:center">Étapes et planning du projet</h3>
                <h5 style="text-align:center">Ne vous inquiétez pas, c'est modifiable plus tard.</h5>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-4">
                        <label for="date_debut_mise_en_oeuvre" class="control-label">Date de début de mise en oeuvre *</label>
                        {!! Form::text('date_debut_mise_en_oeuvre', null, ['class' => 'form-control', 'id' => 'date_debut_mise_en_oeuvre', 'autocomplete' => 'off']) !!}
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="date_fin_mise_en_oeuvre" class="control-label">Date de fin de mise en oeuvre *</label>
                        {!! Form::text('date_fin_mise_en_oeuvre', null, ['class' => 'form-control', 'id' => 'date_fin_mise_en_oeuvre', 'autocomplete' => 'off']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <label for="planning" class="control-label">Planning *</label>
                        <input type="file" name="planning" class="form-control" id="planning">
                    </div>
                </div>                    
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <label for="resultats_finaux" class="control-label">Résultats finaux *</label>
                        <input type="file" name="resultats_finaux" class="form-control" id="resultats_finaux">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-offset-2 col-md-8">
                        <button class="btn btn-warning back5" type="button"><span class="fa fa-arrow-left"></span> Equipe du projet</button> 
                        <button class="btn btn-success  pull-right" type="submit">Continuer </button>
                        <img src="{{asset('public/images/spinner.gif')}}" alt="" id="loader" style="display: none">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('public/js/jquery.validate.js')}}"></script>
    <script type="text/javascript">
        $("#date_debut_mise_en_oeuvre").datetimepicker();
        $("#date_fin_mise_en_oeuvre").datetimepicker();
        $("#duree_recolte").datetimepicker();
        jQuery().ready(function() {
            // validate form on keyup and submit
            var v = jQuery("#basicform").validate({
                rules: {
                    nom_du_projet:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    photo_projet:{
                        required:true,
                    },
                    enonce_du_defi:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    objectifs_du_projet:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    somme_a_recolter:{
                        required:true,
                    },
                    membre_un:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    fonction_membre_un:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    cv_membre_un:{
                        required:true,
                    },
                    membre_deux:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    fonction_membre_deux:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    cv_membre_deux:{
                        required:true,
                    },
                    membre_trois:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    fonction_membre_trois:{
                        required:true,
                        minlength: 2,
                        maxlength: 255
                    },
                    cv_membre_trois:{
                        required:true,
                    },
                    date_debut_mise_en_oeuvre:{
                        required:true,
                        date:true,
                    },
                    date_fin_mise_en_oeuvre:{
                        required:true,
                        date:true,
                    },
                    planning:{
                        required:true,
                    },
                    resultats_finaux:{
                        required:true,
                    },               
                },
                errorElement: "span",
                errorClass: "help-inline-error",
            });
            $(".open1").click(function() {
                if (v.form()) {
                    $(".frm").hide("fast");
                    $("#sf2").show("slow");
                }
            });
            $(".open2").click(function() {
                if (v.form()) {
                    $(".frm").hide("fast");
                    $("#sf3").show("slow");
                }
            });
            $(".open3").click(function() {
                if (v.form()) {
                    $(".frm").hide("fast");
                    $("#sf4").show("slow");
                }
            });
            $(".open4").click(function() {
                if (v.form()) {
                    $(".frm").hide("fast");
                    $("#sf5").show("slow");
                }
            });
            /* Ici */
            $(".back2").click(function() {
                $(".frm").hide("fast");
                $("#sf1").show("slow");
            });
            $(".back3").click(function() {
                $(".frm").hide("fast");
                $("#sf2").show("slow");
            });
            $(".back4").click(function() {
                $(".frm").hide("fast");
                $("#sf3").show("slow");
            });
            $(".back5").click(function() {
                $(".frm").hide("fast");
                $("#sf4").show("slow");
            });
        });
    </script> 
@endsection
