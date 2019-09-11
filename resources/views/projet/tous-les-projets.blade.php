@extends('adminlte::page')

@section('content')
<!-- Afficher la liste des roles -->
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-sm-12" >
        <br>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Tous les projets</h3>
            </div>
            <div class="box-body  table-responsive">
                <table class="table table-striped table-hover" id="postTable" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom du projet</th>
                            <th>Catégorie</th>
                            <th>Publié par</th>
                            <th>Publié le</th>
                            <th>Statut</th>
                            <th colspan="3">&nbsp;</th> 
                        </tr>
                    </thead>
                    <tbody>  
                        @foreach($projets as $projet)
                            <tr>
                                <td>{{$projet->id}}</td>
                                <td>{{$projet->nom_du_projet}}</td>
                                <td>{{$projet->categorie->nom}}</td>
                                <td>{{$projet->user->name}}</td>
                                <td>{{$projet->created_at}}</td>
                                <td>{{$projet->statut}}</td>
                                <td width="10px">
                                    @can('projet.show')
                                        <a href="{{route('projet.show',$projet->id)}}" class="btn btn-md btn-success">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('projet.edit')
                                        <a href="{{route('projet.edit',$projet->id)}}" class="btn btn-md btn-warning">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('projet.destroy')
                                        <form method="post" action="{{route('projet.destroy',$projet->id)}}">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-md btn-danger glyphicon glyphicon-trash" type="submit" onclick="return confirm('Vraiment supprimer ce projet ?')"/>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
        @can('projet.create')
            <a href="{{route('projet.create')}}" class=" btn btn-md btn-success pull-right">
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
    