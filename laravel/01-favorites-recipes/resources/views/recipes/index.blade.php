@extends('layouts.page')

@section('content')
    
    @if($recipes->isEmpty())
        <p>Nessuna ricetta trovata :(</p>
    @else
        <ul>
            @foreach($recipes as $recipe)
                <li><a href="{{ route('recipes.single', $recipe) }}">{{ $recipe->title }}
                    @if(!$recipe->ingredients->isEmpty())
                        ({{ $recipe->ingredients->count() }})
                    @endif
                </a>
            @endforeach
        </ul>
    @endif
@endsection