@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Extracurricular')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Students / Detail /</span> Edit Extracurricular</h4>

<div class="card">
  <h5 class="card-header">Name : {{ $student->first_name }} {{ $student->last_name }}</h5>
  <div class="card-body">

    @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('pages-update-extra', ['studentId' => $student->id, 'extracurricularId' => $extracurricular->id]) }}" method="POST">
      @csrf
      @method('PUT')
      
      <div class="mb-3">
        <label for="extracurricular_id" class="form-label">Extracurricular</label>
        <select class="form-control" id="extracurricular_id" name="extracurricular_id" required>
          @foreach($allExtracurriculars as $item)
            <option value="{{ $item->id }}" {{ $item->id == old('extracurricular_id', $extracurricular->pivot->extracurricular_id) ? 'selected' : '' }}>
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
        <input type="number" class="form-control" id="start_year" name="start_year" value="{{ old('start_year', $extracurricular->pivot->start_year) }}" required>
        @error('start_year')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>

@endsection
