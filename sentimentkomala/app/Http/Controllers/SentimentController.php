<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Predictions;
use Illuminate\Support\Facades\Auth;

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
        $score = $response->json()['score'];

        $sentimentPrediction = Predictions::create([
            'text' => $text,
            'prediction' => $prediction,
            'score' => $score,
            'user_id'=>Auth::user()->id
        ]);

        // Associate prediction with current user
        // $userId = Auth::user()->id; // Assuming you're using Laravel authentication
        // $sentimentPrediction->user_id = $userId;
        $sentimentPrediction->save();


        return view('sentiment.sentiment', ['prediction' => $prediction, 'score'=>$score, 'text'=>$text]);
    }
}
