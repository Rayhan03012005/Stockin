@extends('layouts.app')

@section('title', 'Daftar Transaksi Admin')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-12">
        <h2 class="text-white">Daftar Transaksi</h2>
        <div class="mt-4">
          @if($transactions->isEmpty())
            <p class="text-white">Belum ada transaksi.</p>
          @else
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Pemilik</th>
                  <th>Peminjam</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Kembali</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($transactions as $transaction)
                  <tr>
                    <td>{{ $transaction->item->name }}</td>
                    <td>{{ $transaction->item->user->name }}</td>
                    <td>
                      {{ \App\Models\User::find($transaction->peminjam_id)->name ?? 'Tidak Diketahui' }}
                    </td>
                    <td>{{ $transaction->borrow_date }}</td>
                    <td>{{ $transaction->return_date }}</td>
                    <td>{{ ucfirst($transaction->status) }}</td>
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