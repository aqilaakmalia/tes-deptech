@extends('layouts/contentNavbarLayout')

@section('title', 'Details - Student with Extracurriculars')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Students /</span> Detail with Extracurriculars</h4>

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

{{-- Add Extra --}}
<div class="card">
  <h5 class="card-header">Add Extracurricular</h5>
  <div class="card-body">
    <form action="{{ route('pages-create-extra', ['studentId' => $student->id]) }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="extracurricular_id" class="form-label">Extracurricular</label>
        <select class="form-control" id="extracurricular_id" name="extracurricular_id" required>
          @foreach($extracurriculars as $item)
            <option value="{{ $item->id }}" {{ old('extracurricular_id') == $item->id ? 'selected' : '' }}>
              {{ $item->name }}
            </option>
          @endforeach
        </select>
        @error('extracurricular_id')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="start_year" class="form-label">Start Year</label>
        <input type="number" class="form-control" id="start_year" name="start_year" value="{{ old('start_year') }}" required>
        @error('start_year')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
  </div>
</div>


{{-- List Extra --}}
<div class="card mt-4">
  <h5 class="card-header"> Name : {{ $student->first_name }} {{ $student->last_name }}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Ekstrakurikuler</th>
          <th>Tahun</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @if($student->extracurriculars->isNotEmpty())
          @foreach($student->extracurriculars as $extracurricular)
            <tr>
              <td>{{ $extracurricular->name }}</td>
              <td>{{ $extracurricular->pivot->start_year }}</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{  route('pages-edit-extra', ['studentId' => $student->id, 'extracurricularId' => $extracurricular->id]) }}"><i class="mdi mdi-pencil-outline me-1"></i>Edit</a>
                    <form action="{{ route('pages-delete-extra', ['studentId' => $student->id, 'extracurricularId' => $extracurricular->id]) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="dropdown-item"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="2">No extracurriculars</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</div>

@endsection
