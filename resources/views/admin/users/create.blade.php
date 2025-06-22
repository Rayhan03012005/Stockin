@extends('layouts.app')

@section('title', 'Nama Halaman')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-6" data-aos="fade-up">
        <h2 class="text-center">Create User</h2>
        <form method="POST" action="{{ route('admin.users.store') }}">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role" required>
              <option value="admin">Admin</option>
              <option value="owner">Owner</option>
              <option value="peminjam">Peminjam</option>
            </select>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection