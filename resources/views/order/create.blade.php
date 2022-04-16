@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Order</h3>
          <div class="card-tools">
            <a href="{{ route('order.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          @if ($message = Session::get('error'))
              <div class="alert alert-warning">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <form action="{{ route('order.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="produk_id">Pilihan Produk</label>
              <select name="produk_id" id="produk_id" class="form-control">
                <option value="">Pilih Produk</option>
                @foreach($itemproduk as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                @endforeach
              </select>

            <div class="form-group">
              <label for="nama">Nama Pemesan</label>
              <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="total">Total</label>
              <input type="text" name="total" id="total" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection