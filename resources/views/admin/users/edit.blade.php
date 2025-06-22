@extends('layouts.app')

@section('title', 'Nama Halaman')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      
      <div class="col-lg-6" data-aos="fade-up">
        <h2 class="text-center">Edit User</h2>
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role" required>
              <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
              <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
              <option value="peminjam" {{ $user->role == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
            </select>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection