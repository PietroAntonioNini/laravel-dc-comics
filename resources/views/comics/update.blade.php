@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiorna fumetto</h1>

    <form action="{{ route('comics.update', $comic->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $comic->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="thumb">URL dell'immagine di copertina:</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
        </div>
        <div class="form-group">
            <label for="price">Prezzo:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}" required>
        </div>
        <div class="form-group">
            <label for="series">Serie:</label>
            <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}" required>
        </div>
        <div class="form-group">
            <label for="sale_date">Data di vendita:</label>
            <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}" required>
        </div>
        <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}" required>
        </div>
        <div class="form-group">
            <label for="artists">Artisti:</label>
            <input type="text" name="artists[]" value="{{ $comic->artists }}" class="form-control" multiple required>
        </div>
        <div class="form-group">
            <label for="writers">Scrittori:</label>
            <input type="text" name="writers[]" value="{{ $comic->writers }}" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
    
</div>
@endsection