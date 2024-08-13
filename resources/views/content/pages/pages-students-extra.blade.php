@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Students with Extracurriculars')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Students /</span> List with Extracurriculars</h4>

<div class="card">
  <h5 class="card-header">List of Students with Extracurriculars</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nama Depan</th>
          <th>Nama Belakang</th>
          <th>Jenis Kelamin</th>
          <th>Foto</th>
          <th>Ekstrakurikuler</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($students as $student)
        <tr>
          <td>{{ $student->first_name }}</td>
          <td>{{ $student->last_name }}</td>
          <td>{{ $student->gender }}</td>
          <td>
            <img src="{{ asset($student->photo) }}" alt="Foto" class="rounded-circle" width="50">
          </td>
          <td>
            @if($student->extracurriculars->isNotEmpty())
              <ul>
                @foreach($student->extracurriculars as $extracurricular)
                  <li>{{ $extracurricular->name }} (Start Year: {{ $extracurricular->pivot->start_year }})</li>
                @endforeach
              </ul>
            @else
              No extracurriculars
            @endif
          </td>
           <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('pages-students-extra-detail', $student->id) }}"><i class="mdi mdi-pencil-outline me-1"></i>Detail</a>
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
