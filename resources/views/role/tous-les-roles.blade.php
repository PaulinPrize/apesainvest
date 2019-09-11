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
                <h3 class="panel-title">Tous les rôles</h3>
            </div>
            <div class="box-body  table-responsive">
                <table class="table table-striped table-hover" id="postTable" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Date de création</th>
                            <th>Date de modification</th>
                            <th colspan="3">&nbsp;</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->slug}}</td>
                                <td>{{$role->description}}</td>
                                <td>{{$role->created_at}}</td>
                                <td>{{$role->updated_at}}</td>
                                <td width="10px">
                                    @can('role.show')
                                        <a href="{{route('role.show',$role->id)}}" class="btn btn-md btn-success">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('role.edit')
                                        <a href="{{route('role.edit',$role->id)}}" class="btn btn-md btn-warning">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('role.destroy')
                                        <form method="post" action="{{route('role.destroy',$role->id)}}">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-md btn-danger glyphicon glyphicon-trash" type="submit" onclick="return confirm('Vraiment supprimer ce role ?')"/>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
        @can('role.create')
            <a href="{{route('role.create')}}" class=" btn btn-md btn-success pull-right">
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
    