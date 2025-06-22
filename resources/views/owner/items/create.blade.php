@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-6">
        <h2 class="text-white">Tambah Barang</h2>
        <form method="POST" action="{{ route('owner.items.store') }}" class="mt-4">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label text-white">Nama Barang</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="description" class="form-label text-white">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text-white">Password (Opsional)</label>
            <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}">
            @error('password')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection