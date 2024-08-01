@extends('layouts.layouts')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Visualization Confussion</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Analytics</li>
        <li class="breadcrumb-item active">Confussion</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="container-fluid">

      <!-- Overview Cards -->
      <div class="row">
        <div class="col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">
              <h5 class="card-title">Overall Accuracy</h5>
              <h2 class="card-text">80%</h2>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">
              <h5 class="card-title">Total Data Support</h5>
              <h2 class="card-text">40</h2>
            </div>
          </div>
        </div>
      </div>

      <!-- Metrics Chart -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-title">Performance Metrics Berdasarkan Label</h5>
        </div>
        <div class="card-body">
          <canvas id="performanceChart"></canvas>
        </div>
      </div>

      <!-- Detailed Metrics Cards -->
      <div class="row">
        <!-- Negative -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">Precision</h5>
            </div>
            <div class="card-body">
              <h3>0.89</h3>
              <p>Negatif</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">Recall</h5>
            </div>
            <div class="card-body">
              <h3>0.80</h3>
              <p>Negatif</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">F1 Score</h5>
            </div>
            <div class="card-body">
              <h3>0.84</h3>
              <p>Negatif</p>
            </div>
          </div>
        </div>

        <!-- Neutral -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">Precision</h5>
            </div>
            <div class="card-body">
              <h3>1.00</h3>
              <p>Netral</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">Recall</h5>
            </div>
            <div class="card-body">
              <h3>0.33</h3>
              <p>Netral</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">F1 Score</h5>
            </div>
            <div class="card-body">
              <h3>0.50</h3>
              <p>Netral</p>
            </div>
          </div>
        </div>

        <!-- Positive -->
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">Precision</h5>
            </div>
            <div class="card-body">
              <h3>0.71</h3>
              <p>Positif</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">Recall</h5>
            </div>
            <div class="card-body">
              <h3>0.88</h3>
              <p>Positif</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header">
              <h5 class="card-title">F1 Score</h5>
            </div>
            <div class="card-body">
              <h3>0.79</h3>
              <p>Positif</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

  <script>
    var ctx = document.getElementById('performanceChart').getContext('2d');
    var performanceChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Negatif Precision', 'Negatif Recall', 'Negatif F1 Score', 'Netral Precision', 'Netral Recall', 'Netral F1 Score', 'Positif Precision', 'Positif Recall', 'Positif F1 Score'],
        datasets: [{
          label: 'Metrics',
          data: [0.89, 0.80, 0.84, 1.00, 0.33, 0.50, 0.71, 0.88, 0.79],
          backgroundColor: [
            'rgba(75, 192, 192, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(153, 102, 255, 0.2)'
          ],
          borderColor: [
            'rgba(75, 192, 192, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(153, 102, 255, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

</main><!-- End #main -->
@endsection
