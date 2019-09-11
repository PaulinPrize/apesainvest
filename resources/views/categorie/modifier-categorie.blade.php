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
        <div class="panel panel-success">  
            <div class="panel-heading">Modifier une catégorie</div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::model($categorie, ['route' => ['categorie.update', $categorie->id], 'method' => 'put']) !!}
                        <div class="row">
                            <div class="form-group col-md-6 {!! $errors->has('nom') ? 'has-error' : '' !!}">
                                <label for="nom" class="control-label">Nom *</label>
                                {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
                                {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
                            </div>
                            <div class="form-group col-md-6 {!! $errors->has('slug') ? 'has-error' : '' !!}">
                                <label for="slug" class="control-label">Slug *</label>
                                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) !!}
                                {!! $errors->first('slug', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>                               
                        <div class="clearfix">
                            {!! Form::submit('Envoyer', ['class' => 'btn btn-success pull-right']) !!}
                        </div> 
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    
@section('js')
    <script type="text/javascript"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_costom.css">
@endsection