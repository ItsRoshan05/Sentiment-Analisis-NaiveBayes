@extends('layouts.layouts')

@section('content')
<main id="main" class="main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Prediction Details
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Text:</h5>
                        <p class="card-text">{{ $prediction->text }}</p>

                        <h5 class="card-title">Prediction:</h5>
                        <p class="card-text">{{ $prediction->prediction }}</p>

                        <h5 class="card-title">Score:</h5>
                        <p class="card-text">{{ $prediction->score }}</p>

                        <h5 class="card-title">User:</h5>
                        <p class="card-text">{{ $prediction->user->name ?? 'N/A' }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('predictions.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
