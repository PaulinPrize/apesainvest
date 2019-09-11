@extends('template')

@section('content')
	<main class="container-fluid">
        @isset($category)
            <h2 class="text-title mb-3">{{ $category->nom }}</h2>
        @endif
        @isset($user)
            <h2 class="text-title mb-3">{{ __('Photos de ') . $user->name }}</h2>
        @endif
        <div class="d-flex justify-content-center">
            {{ $images->links() }}
        </div>
        <div class="card-columns">
            @foreach($images as $image)
                <div class="card @if($image->adult) border-danger @endif" id="image{{ $image->id }}">
                    <a href="{{ url('images/' . $image->name) }}" class="image-link">
                        <img class="card-img-top"
                             src="{{ url('thumbs/' . $image->name) }}"
                             alt="image">
                    </a>
                    @isset($image->description)
                        <div class="card-body">
                            <p class="card-text">{{ $image->description }}</p>
                        </div>
                    @endisset
                    <div class="card-footer text-muted">
                        <em>
                            <a href="#" data-toggle="tooltip"
                               title="{{ __('Voir les photos de ') . $image->user->name }}">{{ $image->user->name }}</a>
                        </em>
                        <div class="pull-right">
                            <em>
                                {{ $image->created_at->formatLocalized('%x') }}
                            </em>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $images->links() }}
        </div>
    </main>

@endsection