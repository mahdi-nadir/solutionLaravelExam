<?php

namespace App\Http\Controllers;

use App\Models\Question4;
use Illuminate\Http\Request;

class Question4Controller extends Controller
{
    public function create()
    {
        return view('questions.4');
    }

    public function store(Request $request)
    {
        return redirect()
            ->route('question.4.create')
            ->with('success', 'Created successfully.');
    }
}
