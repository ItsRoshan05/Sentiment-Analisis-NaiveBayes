@extends('layouts.layouts')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Total Users Card -->
      <div class="col-xxl-3 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Total Users</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-person"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $totalUsers }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Predictions Card -->
      <div class="col-xxl-3 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Total Predictions</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-bar-chart"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $totalPredictions }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Prediction Chart -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Prediction Chart</h5>
            <canvas id="predictionsChart" height="100"></canvas>
          </div>
        </div>
      </div>

    </div>
  </section>

</main><!-- End #main -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@latest"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('predictionsChart').getContext('2d');
    
    const predictionsData = @json($predictionsData);
    const labels = Object.keys(predictionsData);
    const data = Object.values(predictionsData);

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Predictions Count',
          data: data,
          borderColor: 'rgba(75, 192, 192, 1)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          x: {
            type: 'time',
            time: {
              unit: 'day'
            },
            title: {
              display: true,
              text: 'Date'
            }
          },
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Count'
            }
          }
        }
      }
    });
  });
</script>
@endsection
