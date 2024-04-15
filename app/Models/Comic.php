<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    // Metodo per definire le regole di validazione
    public static function rules() {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumb' => 'nullable|string|max:500',
            'price' => 'required|string',
            'series' => 'required|string',
            'sale_date' => 'required|date',
            'type' => 'required|string',
            'artists' => 'required|array',
            'writers' => 'required|array',
        ];
    }
}
