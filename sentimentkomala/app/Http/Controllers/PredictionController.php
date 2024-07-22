<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predictions;

class PredictionController extends Controller
{
    public function index()
    {
        $predictions = Predictions::with('user')->get();
        return view('predictions.index', ['predictions' => $predictions]);
    }

    public function show($id)
    {
        $prediction = Predictions::with('user')->findOrFail($id);
        return view('predictions.show', ['prediction' => $prediction]);
    }

    public function create()
    {
        return view('predictions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
            'prediction' => 'required|string|in:Positive,Neutral,Negative',
            'score' => 'required|numeric|between:0,1',
        ]);

        $prediction = Predictions::create($validatedData);

        return redirect()->route('predictions.index')->with('success', 'Prediction created successfully!');
    }

    public function edit($id)
    {
        $prediction = Predictions::findOrFail($id);
        return view('predictions.edit', ['prediction' => $prediction]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
            'prediction' => 'required|string|in:Positive,Neutral,Negative',
            'score' => 'required|numeric|between:0,1',
        ]);

        $prediction = Predictions::findOrFail($id);
        $prediction->update($validatedData);

        return redirect()->route('predictions.index')->with('success', 'Prediction updated successfully!');
    }

    public function destroy($id)
    {
        $prediction = Predictions::findOrFail($id);
        $prediction->delete();

        return redirect()->route('predictions.index')->with('success', 'Prediction deleted successfully!');
    }
}
