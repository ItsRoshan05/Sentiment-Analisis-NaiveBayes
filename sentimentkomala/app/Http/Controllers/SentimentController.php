<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SentimentController extends Controller
{
    //
    public function index()
    {
        return view('sentiment.sentiment');
    }

    public function predict(Request $request)
    {
        $text = $request->input('text');
        $response = Http::post('http://127.0.0.1:5000/predict', [
            'text' => $text,
        ]);

        $prediction = $response->json()['prediction'];

        return view('sentiment.sentiment', ['prediction' => $prediction]);
    }
}
