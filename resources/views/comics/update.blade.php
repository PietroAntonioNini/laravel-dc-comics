@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiorna fumetto</h1>

    <form action="{{ route('comics.update', $comic->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title" value="{{ $comic->title }}" required>
            @error('title') {{$message}} @enderror
        </div>
        <div class="form-group mb-3">
            <label for="description">Descrizione:</label>
            <textarea class="form-control @error('description') is-invalid  @enderror" id="description" name="description" required>{{ $comic->description }}</textarea>
            @error('description') {{$message}} @enderror
        </div>
        <div class="form-group mb-3">
            <label for="thumb">URL dell'immagine di copertina:</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
        </div>
        <div class="form-group mb-3">
            <label for="price">Prezzo:</label>
            <input type="text" class="form-control @error('price') is-invalid  @enderror" id="price" name="price" value="{{ $comic->price }}" required>
            @error('price') {{$message}} @enderror
        </div>
        <div class="form-group mb-3">
            <label for="series">Serie:</label>
            <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="sale_date">Data di vendita:</label>
            <input type="date" class="form-control @error('sale_date') is-invalid  @enderror" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}" required>
            @error('sale_date') {{$message}} @enderror
        </div>
        <div class="form-group mb-3">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control @error('type') is-invalid  @enderror" id="type" name="type" value="{{ $comic->type }}" required>
            @error('type') {{$message}} @enderror
        </div>
        <div class="form-group mb-3">
            <label for="artists">Artisti:</label>
            <input type="text" name="artists[]" value="{{ $comic->artists }}" class="form-control" multiple required>
        </div>
        <div class="form-group mb-4">
            <label for="writers">Scrittori:</label>
            <input type="text" name="writers[]" value="{{ $comic->writers }}" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary py-3 px-4">Salva</button>
    </form>
    
</div>
@endsection