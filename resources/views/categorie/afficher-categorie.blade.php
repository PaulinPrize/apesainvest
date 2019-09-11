@extends('adminlte::page')

@section('content')
<div class="container-fluid">
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            <br>
            <div class="panel panel-success">
                <div class="panel-heading">Fiche catégorie</div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <p>ID : {{ $categorie->id }}</p>
                        <p>Nom : {{ $categorie->nom }}</p>
                        <p>Slug : {{ $categorie->slug }}</p>
                        <p>Photo : {{ $categorie->photo_categorie }}</p>
                        <p>Date de création : {{ $categorie->created_at }}</p>
                        <p>Dernière modification : {{ $categorie->updated_at }}</p>
                    </div>
                </div>
            </div>
            <table>
                <tr>
                    <td>
                        @can('categorie.index')
                            <a href="{{route('categorie.index')}}" class="btn btn-md btn-success">
                                <span class="glyphicon glyphicon-list"></span> Retourner à la liste
                            </a>
                        @endcan
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_costom.css">
@endsection