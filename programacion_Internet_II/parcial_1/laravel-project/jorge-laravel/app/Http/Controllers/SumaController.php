<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function index()
    {
        return view('suma');
    }

    public function sumar(Request $request)
    {
        $validated = $request->validate([
            'a' => ['required', 'numeric'],
            'b' => ['required', 'numeric'],
        ]);

        $resultado = $validated['a'] + $validated['b'];

        return view('suma', [
            'resultado' => $resultado,
        ]);
    }
}
