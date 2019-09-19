@extends('layouts.app')

@section('content')
  <div class="container" style="margin-top: 34px;">
    <div class="col-sm-12" style="margin-top: 100px;margin-bottom: 100px">
      <div class="row">
        <div class="col-lg-7">
          <form method="POST" action="{{ route('project.subscription') }}">
            @csrf
            <div class="form-row">
              <div class="form-group col-lg-4">
                <label for="inputAction">Nombre d'actions</label>
                <input type="number" value="1" class="form-control input-lg onlyNumber" min="1" id="inputAction" autocomplete="off" >
              </div>
              <div class="form-group col-lg-8">
                <label for="inputPassword4">
                  Montant total des actions
                </label>
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text ">XAF</div>
                  </div>
                  <input type="text" class="form-control" id="inputMontant" value="10000" readonly="true" name="inputMontant">
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <label for="inputName">Nom</label>
                <input type="text" class="form-control" id="inputName" placeholder="Noms et Prenoms" value="{{$nom}}" name="inputName">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="inputEmail" value="{{$email}}">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <label for="inputPhone">Telephone</label>
                <input type="text" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" id="inputphone"  name="telephone" placeholder="Numero Telephone">
                  @if ($errors->has('telephone'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$errors->first('telephone')}}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <label for="inputPays">Pays</label>
                <select class="form-control" id="inputPays" name="inputPays">
                  @foreach($liste_pays as $item)
                    <option>{{$item->Commo_Name}}</option>
                  @endforeach
                </select> 
              </div>
              <div class="form-group col">
                <label for="inputPostal">Code Postal</label>
                <input type="inputPostal" name="inputPostal" class="form-control" id="inputPostal" placeholder="Boite Postal"> 
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-lg-12">
                <input type="text" name="comment" class="form-control" id="inputComment" placeholder="rediger un commentaire">
              </div>
            </div>
            <input type="hidden" name="id" value="{{$id}}">
            <input type="hidden" name="name" value="{{$name}}">
            <hr/>
            <button type="submit" class="btn btn-primary col-lg-2 offset-lg-5">Souscrire</button>
          </form>
          <div style="padding-top:10px;padding-bottom: 10px">
            <a class="text-muted" href="#">
                <i class="fa fa-long-arrow-left">Revenir</i>
            </a>
          </div>
        </div> 
        <div class="col-lg-4 offset-lg-1">
          <div class="blocck">
            <p>
              <span style="font-weight: bold;font-size: 25px;font-family: verdana">XAf {{$projet->somme_recoltee}}</span>
              <span style="font-size: 15px;font-family: verdana">de XAf {{$projet->somme_a_recolter}}</span>
            </p>
            <p class="font-weight-light">objectif à atteindre</p>
            <div class="progress">
              <div class="progress-bar progress-bar-success" role="progressbar" style="width: {{$pourcentage}}%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                {{$pourcentage}}%
              </div>
            </div>
            <p class="font-weight-light py-3">
              {{$pourcentage}}% Lévés par 12 Investisseurs
            </p>
          </div>
          <div class="blocck">
            <img src="{{asset('public/img/projets/logo/images/'.$projet->photo_projet.'')}}"
              class="img-fluid rounded" id="project_image">
          </div>
          <div class="blocck">
            <p class="text-center">Posté par:</p>
            <p class="text-center" style="text-transform:uppercase;font-size: 18px; font-weight: bold">{{$nom}}</p>
            <div class="text-center">
              <img src="{{asset('public/img/avatars/'.$photo.'')}}"
                class="rounded-circle img-fluid" width="50" height="50">
            </div>
            <p class="text-center">
              le {{Carbon\Carbon::parse($projet->date_debut_mise_en_oeuvre)->toFormattedDateString()}}
            </p>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <script>
    $(function(){
      $('#inputAction').on('click blur',function(){
        var nbre_action = parseInt($(this).val());
        var value = nbre_action * 10000;
        $('#inputMontant').val(value);
      });
    })
  </script>
@endsection

