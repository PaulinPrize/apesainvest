@extends('adminlte::page')

@section('content')
<!-- Afficher la liste des roles -->
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-sm-12">
        <br>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Toutes les catégories</h3>
            </div>
            <div class="box-body  table-responsive">
                <table class="table table-striped table-hover" id="postTable" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Photo</th>
                            <th>Date de création</th>
                            <th>Date de modification</th>
                            <th colspan="3">&nbsp;</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{$categorie->id}}</td>
                                <td>{{$categorie->nom}}</td>
                                <td>{{$categorie->slug}}</td>
                                <td>{{$categorie->photo_categorie}}</td>
                                <td>{{$categorie->created_at}}</td>
                                <td>{{$categorie->updated_at}}</td>
                                <td width="10px">
                                    @can('categorie.show')
                                        <a href="{{route('categorie.show',$categorie->id)}}" class="btn btn-md btn-success">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('categorie.edit')
                                        <a href="{{route('categorie.edit',$categorie->id)}}" class="btn btn-md btn-warning">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('categorie.destroy')
                                        <form method="post" action="{{route('categorie.destroy',$categorie->id)}}">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-md btn-danger glyphicon glyphicon-trash" type="submit" onclick="return confirm('Vraiment supprimer cette categorie ?')"/>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
        @can('categorie.create')
            <a href="{{route('categorie.create')}}" class=" btn btn-md btn-success pull-right">
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
    