@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-12">
        <h2 class="text-white">Daftar Barang</h2>
        <div class="mt-4">
          @if($items->isEmpty())
            <p class="text-white">Tidak ada barang tersedia.</p>
          @else
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                  <th>Pemilik</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>
                      <a href="{{ route('peminjam.transactions.create', $item->id) }}" class="btn btn-sm btn-primary">Pinjam</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection