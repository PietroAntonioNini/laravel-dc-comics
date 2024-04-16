<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComicsRequest;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComicsRequest $request)
    {

        // Validiamo la richiesta e otteniamo i dati validati
        $validatedData = $request->validated();

        // Creiamo un nuovo fumetto con i dati validati
        $newComic = new Comic();
        $newComic->fill($validatedData);
        
        $newComic->save();

        // Reindirizziamo l'utente alla pagina degli indici dei fumetti
        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.update', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreComicsRequest $request, Comic $comic)
    {

        //funzione che valida la nostra richiesta
        $request->validated();

        //modifica comics esistente 
        $comic->fill($request->all());

        $comic->save();

        return redirect()->route('comics.index')->with('success', 'Fumetto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}