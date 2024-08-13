@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Extracurriculars')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Extracurriculars /</span> List</h4>

<div class="card">
  <h5 class="card-header">List Extracurriculars</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nama Ekstrakurikuler</th>
          
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($extracurriculars as $extracurricular)
        <tr>
          <td>{{ $extracurricular->name }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
