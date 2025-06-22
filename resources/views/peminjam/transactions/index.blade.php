@extends('layouts.app')

@section('title', 'Daftar Transaksi Peminjam')

@section('content')
<section id="hero" class="hero section dark-background">
  <div class="container text-center">
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-lg-12">
        <h2 class="text-white">Daftar Transaksi</h2>
        <div class="mt-4">
          @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($transactions->isEmpty())
        <p>Belum ada transaksi.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Owner</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->item->name }}</td>
                        <td>{{ $transaction->owner->name }}</td>
                        <td>{{ $transaction->borrow_date }}</td>
                        <td>{{ $transaction->return_date ?? '-' }}</td>
                        <td>{{ ucfirst($transaction->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection