@extends('layouts.layouts')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
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
      <th>Hasil Prediksi</th>
      <th>Score</th>
      <th>user</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($predictions as $data)
    <tr>
      <td>{{$data->text}}</td>
      <td>{{$data->prediction}}</td>
      <td>{{$data->score}}</td>
      <td>{{ $data->user->name ?? 'N/A' }}</td>
      <td>
            <a href="{{ route('predictions.show', $data) }}" class="btn btn-info">View</a>
            <!-- <a href="{{ route('predictions.edit', $data) }}" class="btn btn-warning">Edit</a> -->
            <form action="{{ route('predictions.destroy', $data) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

</table>

</section>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
  </main><!-- End #main -->

@endsection
