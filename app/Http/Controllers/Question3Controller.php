<?php

namespace App\Http\Controllers;

use App\Models\Question3;
use Illuminate\Http\Request;

class Question3Controller extends Controller
{
    public function index(Request $request)
    {
        // dd($request->query);
        $query = Question3::query();
        // dd($query);
        $colonne = $request->query->get('col');
        $direction = $request->query->get('dir');
        $limite = $request->query->get('lim');

        if ($colonne && $direction && $limite) {
            $query->orderBy($colonne, $direction)->take($limite); // reference: https://stackoverflow.com/questions/17006309/how-to-sort-a-laravel-query-builder-result-by-multiple-columns
        }

        return view('questions.3', [
            'question3' => $query->get(),
        ]);
    }
}
