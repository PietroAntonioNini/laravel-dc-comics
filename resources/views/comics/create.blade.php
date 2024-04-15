@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi nuovo fumetto</h1>

    <form action="{{ route('comics.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title" >
            @error('title') {{$message}} @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea class="form-control @error('description') is-invalid  @enderror" id="description" name="description" >{{old('description')}}</textarea>
            @error('description') {{$message}} @enderror
        </div>
        <div class="form-group">
            <label for="thumb">URL dell'immagine di copertina:</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{old('thumb')}}">
        </div>
        <div class="form-group">
            <label for="price">Prezzo:</label>
            <input type="text" class="form-control @error('price') is-invalid  @enderror" id="price" name="price" value="{{old('price')}}" >
            @error('price') {{$message}} @enderror
        </div>
        <div class="form-group">
            <label for="series">Serie:</label>
            <input type="text" class="form-control" id="series" name="series" value="{{old('series')}}">
        </div>
        <div class="form-group">
            <label for="sale_date">Data di vendita:</label>
            <input type="date" class="form-control @error('sale_date') is-invalid  @enderror" id="sale_date" name="sale_date" value="{{old('sale_date')}}" >
            @error('sale_date') {{$message}} @enderror
        </div>
        <div class="form-group">
            <label for="type">Tipo:</label>
            <input type="text" class="form-control @error('type') is-invalid  @enderror" id="type" name="type" value="{{old('type')}}" >
            @error('type') {{$message}} @enderror
        </div>
        <div class="form-group">
            <label for="artists">Artisti:</label>
            <input type="text" name="artists[]" value="{{ implode(',', old('artists', [])) }}" class="form-control" multiple>
        </div>
        <div class="form-group">
            <label for="writers">Scrittori:</label>
            <input type="text" name="writers[]" value="{{ implode(',', old('writers', [])) }}" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection
