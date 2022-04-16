@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <!-- table Order -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Order</h4>
          <div class="card-tools">
            <a href="{{ route('order.create') }}" class="btn btn-sm btn-primary">
              Baru
            </a>
          </div>
        </div>
        <div class="card-body">
          <form action="#">
            <div class="row">
              <div class="col">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="ketik keyword disini">
              </div>
              <div class="col-auto">
                <button class="btn btn-primary">
                  Cari
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
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
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="50px">No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemorder as $order)
                <tr>
                  <td>
                  {{ ++$no }}
                  </td>
                  <td>
                  {{ $order->nama }}
                  </td>
                  <td>
                  {{ $order->alamat }}
                  </td>
                  <td>
                  {{ number_format($order->total, 2) }}
                  </td>
                  <td>
                    <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Detail
                    </a>
                    <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-primary mr-2 mb-2">
                      Edit
                    </a>
                    <form action="{{ route('order.destroy', $order->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm btn-danger mb-2">
                        Hapus
                      </button>                    
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $itemorder->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection