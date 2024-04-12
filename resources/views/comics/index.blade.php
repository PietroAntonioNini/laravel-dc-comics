@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comics</h1>
    <a href="{{ route('comics.create') }}" class="btn btn-primary">Aggiungi nuovo</a>
    <div class="mt-3">
        @foreach ($comics as $comic)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                    <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary">Dettagli</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection