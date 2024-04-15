<?php

namespace App\Http\Controllers;

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
        return view('comics/index', compact('comics'));

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
    public function store(Request $request)
    {

        //funzione che valida la nostra richiesta
        $this->validation($request->all());

        //crea un nuovo comics
        $newComic = new Comic();

        $newComic->title = $request['title'];
        $newComic->description = $request['description'];
        $newComic->thumb = $request['thumb'];
        $newComic->price = $request['price'];
        $newComic->series = $request['series'];
        $newComic->sale_date = $request['sale_date'];
        $newComic->type = $request['type'];
        $newComic->artists = json_encode($request['artists']);
        $newComic->writers = json_encode($request['writers']);

        $newComic->save();

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
    public function update(Request $request, Comic $comic)
    {

        //funzione che valida la nostra richiesta
        $this->validation($request->all());

        //modifica comics esistente 
        $comic->title = $request['title'];
        $comic->description = $request['description'];
        $comic->thumb = $request['thumb'];
        $comic->price = $request['price'];
        $comic->series = $request['series'];
        $comic->sale_date = $request['sale_date'];
        $comic->type = $request['type'];
        $comic->artists = json_encode($request['artists']);
        $comic->writers = json_encode($request['writers']);

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


    //funzione per la validazione dei campi inseriti dall'utente
    private function validation($data){
        
        $validator = Validator::make($data,[

            'title' => 'required|string|unique|max:255',
            'description' => 'required|string|max:5000',
            'thumb' => 'nullable|string',
            'price' => 'required|string',
            'series' => 'nullable|string',
            'sale_date' => 'required|date',
            'type' => 'required|string|max:80',

        ], [
            'title.required' => 'Inserisci il Titolo',
            'description.required' => 'Inserisci una descrizione',
            'price.required' => 'Inserisci un prezzo',
            'sale_date.required' => 'Inserisci una data',
            'type.required' => 'Inserisci il tipo',
            
            'max' => 'Il campo :attribute deve avere massimo :max caratteri',

        ])->validate();
    }
}
