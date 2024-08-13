@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Students /</span> List</h4>

<!-- Display the success message if it exists -->
@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
  <h5 class="card-header">List Students</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nama Depan</th>
          <th>Nama Belakang</th>
          <th>Nomor HP</th>
          <th>Nomor Induk Siswa</th>
          <th>Alamat</th>
          <th>Jenis Kelamin</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($students as $student)
        <tr>
          <td>{{ $student->first_name }}</td>
          <td>{{ $student->last_name }}</td>
          <td>{{ $student->phone_number }}</td>
          <td>{{ $student->student_number }}</td>
          <td>{{ $student->address }}</td>
          <td>{{ $student->gender }}</td>
          <td>
            <img src="{{ asset($student->photo) }}" alt="Foto" class="rounded-circle" width="50">
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('pages-students-edit', $student->id) }}">
                  <i class="mdi mdi-pencil-outline me-1"></i> Edit
                </a>
              <form action="{{ route('student-delete', $student->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="dropdown-item"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
              </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
