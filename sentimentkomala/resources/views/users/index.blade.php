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
      <th>Name</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
            <a href="{{ route('users.show', $user) }}" class="btn btn-info">View</a>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
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
