@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<!-- Display the success message if it exists -->
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h4 class="card-header">Profile Details</h4>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
              <input type="file" id="upload" name="photo" class="account-file-input" hidden accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-outline-danger account-image-reset mb-3">
              <i class="mdi mdi-reload d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Reset</span>
            </button>

            <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
          </div>
        </div>
      </div>
      <div class="card-body pt-2 mt-1">
        <form id="formAccountSettings" method="POST" action="{{ route('account-settings-update', $user->id) }}">
          @csrf
          @method('PUT')
          <div class="row mt-2 gy-4">
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="firstName" name="first_name" value="{{ old('first_name', $user->first_name) }}" autofocus />
                <label for="firstName">First Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" name="last_name" id="lastName" value="{{ old('last_name', $user->last_name) }}" />
                <label for="lastName">Last Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="john.doe@example.com" />
                <label for="email">E-mail</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="date" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" placeholder="YYYY-MM-DD" />
                <label for="birthdate">Birthdate</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="gender" name="gender" value="{{ old('gender', $user->gender) }}" placeholder="male/female" />
                <label for="gender">Gender</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" />
                <label for="password">Password</label>
              </div>
            </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary">Reset</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>
@endsection
