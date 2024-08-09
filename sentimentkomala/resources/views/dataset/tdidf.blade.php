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
            <th>Term</th>
            <th>tf</th>
            <th>df</th>
            <th>idf</th>
            <th>tfidf</th>
            <th>Sentiment</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $item)
            @if($item['tf'] > 0)
              <tr>
                <td>{{ $item['Term'] }}</td>
                <td>{{ $item['tf'] }}</td>
                <td>{{ $item['df'] }}</td>
                <td>{{ $item['idf'] }}</td>
                <td>{{ $item['tfidf'] }}</td>
                <td>{{ $item['sentiment'] }}</td>
              </tr>
            @endif
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
