@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading"><b><center><h4>Data Pelanggan</h4></center></b>

              </div>
              
                <!-- Table -->
                <table class="table">
                    <tr>
                      <th><b>@sortablelink('nama')</b></th>
                      <th><b>@sortablelink('alamat')</b></th>
                      <th><b>@sortablelink('no_tlp', 'Nomor Telepon')</b></th>
                      <td>
                        <form action="{{ route('owner.PelangganPDF') }}">
                        {{ csrf_field() }}
                          <button type="submit" title="Cetak PDF" class="btn btn-xs btn-danger">Cetak PDF</button>
                        </form>
                      </td>
                      <td></td>
                    <tr>
                    @foreach($pelanggans as $pelanggan)
                    <tr>
                      <td>{{ $pelanggan->nama }}</td>
                      <td>{{ $pelanggan->alamat }}</td>
                      <td>{{ $pelanggan->no_tlp }}</td>
                      <td></td>
                    </tr>
                    @endforeach
                </table>
                
            </div>
            {!! $pelanggans->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
</div>
@endsection
