<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Question5Controller extends Controller
{
    public function index(Request $request)
    {
        // On récupère l'heure actuelle en UTC avec la classe Carbon
        $current = Carbon::now();
        // Pour avoir l'heure actuelle, on utilise les propriétés de l'objet Carbon
        // Supprimez la ligne dd() ci-dessous et ajouter votre code par la suite
        // dd($current->hour, $current->minute, $current->second);
        if ($current->hour >= 00 && $current->hour < 12) {
            return view('questions.5.matin');
        } elseif ($current->hour >= 12 && $current->hour < 20) {
            return view('questions.5.jour');
        } else {
            return view('questions.5.soir');
        }
    }
}
