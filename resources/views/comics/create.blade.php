@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi nuovo</h1>
    <form action="{{ route('comics.store') }}" method="POST">
        @csrf
        <!-- Aggiungi qui i campi del tuo modulo -->
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection