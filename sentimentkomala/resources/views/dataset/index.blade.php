@extends('layouts.layouts')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Pelatihan</h1>
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
            <th>Nama</th>
            <th>Rating</th>
            <th>Ulasan</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $item)
          <tr>
            <td>{{ $item['userName'] }}</td>
            <td>{{ $item['rating'] }}</td>
            <td>{{ $item['cleaned_ulasan'] }}</td>
            <td>{{ $item['Keterangan'] }}</td>
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
