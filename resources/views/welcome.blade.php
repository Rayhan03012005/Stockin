@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

<section id="hero" class="hero section dark-background">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 col-12 d-flex flex-column align-items-center text-center" data-aos="fade-up">
        <h1>Welcome to Stockin</h1>
        <p data-aos="fade-up" data-aos-delay="100">Bukti Digital Peminjaman Barang</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="200">
          <a href="{{ route('login') }}" class="btn-get-started">Mulai</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

