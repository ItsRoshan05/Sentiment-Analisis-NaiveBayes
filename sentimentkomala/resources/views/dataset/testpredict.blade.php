@extends('layouts.layouts')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Pelatihan Testing Prediksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <table id="example" class="display">
      <thead>
          <tr>
            <th>Text</th>
            <th>Actual</th>
            <th>Predicted</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $item)
            <tr>
              <td>{{ $item['Text'] }}</td>
              <td>{{ $item['Actual'] }}</td>
              <td>{{ $item['Predicted'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
  </main><!-- End #main -->
@endsection
