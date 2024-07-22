@extends('layouts.layouts')


@section('content')
 <main id="main" class="main">
 <h1>Sentiment Analysis</h1>
    <form method="POST" action="/sentiment">
        @csrf
        <label for="text">Enter text:</label>
        <input type="text" id="text" name="text" required>
        <button type="submit">Predict</button>
    </form>

    @isset($prediction)
        <h2>Prediction: {{ $prediction }}</h2>
    @endisset
 </main>
@endsection