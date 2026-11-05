@extends('layouts.page')

@section('content')
    
    @if($recipes->isEmpty())
        <p>Nessuna ricetta trovata :(</p>
    @else
        @foreach($recipes as $recipe)
            <a href="recipes/{{ $recipe->id }}">{{ $recipe->name }}</a>
        @endforeach
    @endif
@endsection