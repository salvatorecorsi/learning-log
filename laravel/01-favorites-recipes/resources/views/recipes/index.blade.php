@extends('layouts.page')

@section('content')
    
    @if($recipes->isEmpty())
        <p>Nessuna ricetta trovata :(</p>
    @else
        @foreach($recipes as $recipe)
            <a href="recipes/{{ $recipe->id }}">{{ $recipe->name }}</a>
            @if($recipe->ingredients->isEmpty())
                <p>Nessun ingrediente associato</p>
            @else
                {{ $recipe->ingredients }}
            @endif


        @endforeach
    @endif
@endsection