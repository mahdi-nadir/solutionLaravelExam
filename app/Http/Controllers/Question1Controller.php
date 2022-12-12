<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Question1Controller extends Controller
{
    public function index(Request $request)
    {
        return view('questions.1');
    }
}
