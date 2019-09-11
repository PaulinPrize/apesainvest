@extends('adminlte::page')

@section('content')
<!-- Afficher la liste des utilisateurs -->
<div class="container-fluid">
    <!-- Sert à afficher un message éventuel provenant du contrôleur -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-sm-12">
        <br>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Tous les utilisateurs</h3>
            </div>
            <div class="box-body  table-responsive">
                <table class="table table-striped table-hover" id="postTable" >
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Dernière connexion</th>
                            <th>Adresse IP</th>
                            <th>Etat</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->last_login_at}}</td>
                                <td>{{$user->last_login_ip}}</td>
                                <td>
                                    @if($user->isOnline())
                                        <i class="fa fa-circle text-success"></i> En ligne
                                    @else
                                        <i class="fa fa-circle text-muted"></i> Déconnecté
                                    @endif
                                </td>
                                <td width="10px">
                                    @can('user.show')
                                        <a href="{{route('user.show',$user->id)}}" class="btn btn-md btn-success">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('user.edit')
                                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-md btn-warning">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('user.destroy')
                                        <form method="post" action="{{route('user.destroy',$user->id)}}">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-md btn-danger glyphicon glyphicon-trash" type="submit" onclick="return confirm('Vraiment supprimer cet utilisateur')"/>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
        @can('user.create')
            <a href="{{route('user.create')}}" class=" btn btn-md btn-success pull-right">
                <span class="glyphicon glyphicon-plus"></span> Ajouter
            </a>
        @endcan
        {!! $links !!}
    </div>
</div>
@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_costom.css">
@endsection
    