@extends('layouts.app')

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
                      <td>
                        <form action="{{ route('owner.TransaksiPDF') }}">
                        {{ csrf_field() }}
                          <button type="submit" title="Cetak PDF" class="btn btn-xs btn-danger">Cetak PDF</button>
                        </form>
                      </td>
                    <tr>
                    @foreach($transaksis as $transaksi)
                    <tr>
                      <td>{{ $transaksi->pelanggan->nama }}</td>
                      <td>{{ $transaksi->barang->nama }}</td>
                      <td>{{ $transaksi->ukuran }} m</td>
                      <td>Rp.{{ $transaksi->harga_total }},00</td>
                      <td><button type="submit" title="Tambah Data" class="btn btn-xs btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Info&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></td>
                    </tr>
                    @endforeach
                </table>
                
            </div>
            {!! $transaksis->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
</div>
@endsection
