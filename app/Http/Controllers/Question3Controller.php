<?php

namespace App\Http\Controllers;

use App\Models\Question3;
use Illuminate\Http\Request;

class Question3Controller extends Controller
{
    public function index(Request $request)
    {
        $query = Question3::query();
        return view('questions.3', [
            'question3' => $query->get(),
        ]);
    }
}
