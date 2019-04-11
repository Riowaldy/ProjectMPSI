@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading"><b><center><h4>Data Transaksi</h4></center></b>

              </div>
              
                <!-- Table -->
                <table class="table">
                    <tr>
                      <th><b>@sortablelink('pelanggan->nama','Nama Pelanggan')</b></th>
                      <th><b>@sortablelink('barang->nama','Nama Barang')</b></th>
                      <th><b>@sortablelink('ukuran')</b></th>
                      <th><b>@sortablelink('harga_total','Total Harga')</b></th>
                      <th><b>@sortablelink('created_at','Waktu Transaksi')</b></th>
                    <tr>
                    @foreach($transaksis as $transaksi)
                    <tr>
                      <td>{{ $transaksi->pelanggan->nama }}</td>
                      <td>{{ $transaksi->barang->nama }}</td>
                      <td>{{ $transaksi->ukuran }} meter</td>
                      <td>Rp.{{ $transaksi->harga_total }},00</td>
                      <td>{{ $transaksi->created_at }}</td>
                    </tr>
                    @endforeach
                </table>
                
            </div>
            {!! $transaksis->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
</div>

@endsection
