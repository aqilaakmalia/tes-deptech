@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Student')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Student /</span> Edit</h4>

<!-- Display the success message if it exists -->
@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!-- Basic Layout & Basic with Icons -->
<div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Detail Student</h5> 
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('student-update', $student->id) }}">
          @csrf
          @method('PUT')
          
          <!-- Photo -->
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img src="{{asset(old('photo', $student->photo))}}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                  <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                </label>
                <button type="button" class="btn btn-outline-danger account-image-reset mb-3">
                  <i class="mdi mdi-reload d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>
    
                <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
              </div>
            </div>
          </div>

          <!-- First Name -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="first_name">First Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}" placeholder="John" />
            </div>
          </div>
          
          <!-- Last Name -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="last_name">Last Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}" placeholder="Doe" />
            </div>
          </div>
          
          <!-- Phone Number -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="phone_number">Phone No</label>
            <div class="col-sm-10">
              <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $student->phone_number) }}" placeholder="08xxxxxxxxx" />
            </div>
          </div>

          <!-- Student Number -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="student_number">Student Number</label>
            <div class="col-sm-10">
              <input type="text" id="student_number" name="student_number" class="form-control" value="{{ old('student_number', $student->student_number) }}" />
            </div>
          </div>
          
          <!-- Address -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="address">Address</label>
            <div class="col-sm-10">
              <textarea id="address" name="address" class="form-control" placeholder="123 Main St, City, Country">{{ old('address', $student->address) }}</textarea>
            </div>
          </div>

          <!-- Gender -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="gender">Gender</label>
            <div class="col-sm-10">
              <select id="gender" name="gender" class="form-select">
                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
              </select>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
