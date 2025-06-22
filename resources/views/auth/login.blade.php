
@extends('layouts.app')

@section('title', 'Nama Halaman')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-6">
        <h2 class="text-white">Login</h2>
        @if (session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}" class="mt-4">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label text-white">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text-white">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
