@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading"><b><center><h4>Data Barang</h4></center></b>

              </div>
              
                <!-- Table -->
                <table class="table">
                    <tr>
                      <th><b>@sortablelink('nama')</b></th>
                      <th><b>@sortablelink('jenis')</b></th>
                      <th><b>@sortablelink('supplier')</b></th>
                      <th><b>@sortablelink('harga')</b></th>
                      
                      <td>
                        <form action="{{ route('owner.BarangPDF') }}">
                        {{ csrf_field() }}
                          <button type="submit" title="Cetak PDF" class="btn btn-xs btn-danger">Cetak PDF</button>
                        </form>
                      </td>
                      
                    <tr>
                    @foreach($barangs as $barang)
                    <tr>
                      <td>{{ $barang->nama }}</td>
                      <td>{{ $barang->jenis }}</td>
                      <td>{{ $barang->supplier }}</td>
                      <td>Rp.{{ $barang->harga }},00</td>
                      <td></td>
                    </tr>
                    @endforeach
                </table>
                
            </div>
            {!! $barangs->render() !!}
        </div>
    </div>
</div>


@endsection
