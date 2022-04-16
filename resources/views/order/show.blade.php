@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Order</h3>
          <div class="card-tools">
            <a href="{{ route('order.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <td>Nama Pemesan</td>
                <td>
                {{ $itemorder->nama }}
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>
                {{ $itemorder->alamat }} 
                </td>
              </tr>
              </tr>
                <td>Total</td>
                <td>
                  Rp. {{ number_format($itemorder->total, 2) }}
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection