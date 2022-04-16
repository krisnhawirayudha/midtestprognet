@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Produk</h3>
          <div class="card-tools">
            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <td>Nama Produk</td>
                <td>
                {{ $itemproduk->nama_produk }}
                </td>
              </tr>
              <tr>
                <td>Deskripsi</td>
                <td>
                {{ $itemproduk->deskripsi }} 
                </td>
              </tr>
              <tr>
              <td>Stok</td>
                <td>
                {{ $itemproduk->stok }} 
                </td>
              </tr>
              </tr>
              <td>Berat (kg)</td>
                <td>
                {{ $itemproduk->berat }} 
                </td>
              </tr>
                <td>Harga</td>
                <td>
                  Rp. {{ number_format($itemproduk->harga, 2) }}
                </td>
              </tr>
              <tr>
                <td>Rating</td>
                <td>
                {{ $itemproduk->rating }} 
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection