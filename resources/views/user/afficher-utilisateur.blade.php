@extends('adminlte::page')

@section('content')
<div class="container-fluid">
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-9">
            <br>
            <div class="panel panel-success">
                <div class="panel-heading">Fiche d'utilisateur</div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <p>ID : {{ $user->id }}</p>
                        <p>Nom : {{ $user->name }}</p>
                        <p>Email : {{ $user->email }}</p>
                        <p>Date de création : {{ $user->created_at }}</p>
                        <p>Dernière modification : {{ $user->updated_at }}</p>
                        <p>Téléphone : {{ $user->telephone }}</p>
                        <p>Dernière connexion : {{ $user->last_login_at }}</p>
                        <p>Dernière adresse IP : {{ $user->last_login_ip }}</p>
                    </div>
                </div>
            </div>
            <table>
                <tr>
                    <td>
                        @can('user.index')
                            <a href="{{route('user.index')}}" class="btn btn-md btn-success">
                                <span class="glyphicon glyphicon-list"></span> Retourner à la liste
                            </a>
                        @endcan                        
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-3">
            <br>
            <div class="panel panel-success">
                <div class="panel-heading text-center">Photo</div>
                <div class="panel-body">
                    <div class="thumbnail">
                        <img src="{{asset('public/img/avatars/'.$user->photo.'')}}" class="img-square" style="height:225px;width:225px;">
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