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
                <div class="panel-heading">Fiche rôle</div>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <p>ID : {{ $role->id }}</p>
                        <p>Nom : {{ $role->name }}</p>
                        <p>Slug : {{ $role->slug }}</p>
                        <p>Description : {{ $role->description }}</p>
                        <p>Date de création : {{ $role->created_at }}</p>
                        <p>Dernière modification : {{ $role->updated_at }}</p>
                    </div>
                </div>
            </div>
            <table>
                <tr>
                    <td>
                        @can('user.index')
                            <a href="{{route('role.index')}}" class="btn btn-md btn-success">
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