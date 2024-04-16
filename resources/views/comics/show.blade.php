@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ $comic->title }}</h1>
    
    <p><strong>Descrizione:</strong> {{ $comic->description }}</p>

    @if($comic->thumb)
    <p><strong>Thumb:</strong> <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" style="max-width: 200px;"></p>
    @endif
    
    <p><strong>Prezzo:</strong> {{ $comic->price }}</p>
    <p><strong>Serie:</strong> {{ $comic->series }}</p>
    <p><strong>Data di vendita:</strong> {{ $comic->sale_date }}</p>
    <p><strong>Tipo:</strong> {{ $comic->type }}</p>
    <p><strong>Artisti:</strong> {{ implode(', ', json_decode($comic->artists, true) ?? []) }}</p>
    <p><strong>Scrittori:</strong> {{ implode(', ', json_decode($comic->writers, true) ?? []) }}</p>


    <!-- Link per tornare alla pagina precedente -->
    <a href="{{ route('comics.index') }}" class="btn btn-primary">Torna Indietro</a>
    
</div>
@endsection