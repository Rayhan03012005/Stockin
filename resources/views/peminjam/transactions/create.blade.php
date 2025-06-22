@extends('layouts.app')

@section('title', 'Pinjam Barang')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-6">
        <h2 class="text-white">Pinjam Barang</h2>
        <form method="POST" action="{{ route('peminjam.transactions.store') }}" class="mt-4">
          @csrf
          <input type="hidden" name="item_id" value="{{ $item->id }}">
          <div class="mb-3">
            <input type="text" class="form-control" value="{{ $item->name }}" disabled>
          </div>
          <div class="mb-3">
            <label for="borrow_date" class="form-label text-white">Tanggal Pinjam</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ old('borrow_date') }}" required>
            @error('borrow_date')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="return_date" class="form-label text-white">Tanggal Kembali</label>
            <input type="date" name="return_date" id="return_date" class="form-control" value="{{ old('return_date') }}" required>
            @error('return_date')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text-white">Password Barang</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" required>
            @error('password')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Pinjam</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection