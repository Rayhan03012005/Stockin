@extends('layouts.app')

@section('title', 'Daftar Barang Owner')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-12">
        <h2 class="text-white">Daftar Barang</h2>
        <div class="mt-4">
          <a href="{{ route('owner.items.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
          @if($items->isEmpty())
            <p class="text-white">Belum ada barang.</p>
          @else
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($items as $item)
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                      @if($item->transactions->where('status', 'pending')->isNotEmpty())
                        Dipinjam
                      @else
                        Tersedia
                      @endif
                    </td>
                    <td>
                      @if($item->transactions->where('status', 'pending')->isNotEmpty())
                        <form action="{{ route('owner.transactions.return', $item->transactions->where('status', 'pending')->first()->id) }}" method="POST" style="display:inline;">
                          @csrf
                          <button type="submit" class="btn btn-sm btn-success">Dikembalikan</button>
                        </form>
                      @else
                        <a href="{{ route('owner.items.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('owner.items.destroy', $item->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                      @endif
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