@extends('layouts.layouts')


@section('content')
 <main id="main" class="main">
 <div class="container mt-5">
        <h1>Sentiment Analysis</h1>

        <form method="POST" action="{{ route('sentiment.prediksi') }}" class="mt-3">
            @csrf
            <div class="form-group">
                <label for="inputText">Masukan Text yang akan di prediksi:</label>
                <textarea class="form-control" id="inputText" name="text" rows="5"></textarea>
            </div><br>
            <button type="submit" class="btn btn-primary">Prediksi</button>
        </form>

        @if(isset($prediction))
            <div class="mt-3">
                <p>Text: <span><b>{{$text}}</b></span></p>
                <h3>Prediction: <span class="{{ $prediction === 'Positif' ? 'text-success' : 'text-danger' }}">{{ $prediction }}</span></h3>
                <h4>Scorenya adalah : {{ $score }}</h4>
            </div>

        @endif
    </div>
 </main>
@endsection