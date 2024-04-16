@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comics</h1>
    <a href="{{ route('create') }}" class="btn btn-primary">Aggiungi nuovo</a>
    <div class="mt-3">
        @foreach ($comics as $comic)
            <div class="card mb-3 p-3 ">
                <div class="card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                </div>

                {{-- eliminazione --}}
                <div class="d-flex">
                    <a href="{{ route('show', $comic) }}" class="btn btn-primary me-5">Dettagli</a>
                    <a href="{{ route('edit', $comic) }}" class="btn btn-primary me-2">Modifica</a>

                    <form action="{{ route('destroy', $comic->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo elemento?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Elimina fumetto</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection