@extends('layouts.appadmin')
@section('navbar')
  <div class="collapse navbar-collapse" id="app-navbar-collapse">
  <!-- Left Side Of Navbar -->
  <ul class="nav navbar-nav">
      &nbsp;
  </ul>

  <!-- Right Side Of Navbar -->
  <ul class="nav nav-pills navbar-right">
      <!-- Authentication Links -->
      @guest
          <li><a href="{{ route('admin.login') }}">Login</a></li>
      @else
          <li role="presentation"><a href="{{ route('admin.home') }}">Beranda</a></li>
          <li role="presentation"><a href="{{ route('admin.pelanggan') }}">Pelanggan</a></li>
          <li role="presentation" class="active"><a href="{{ route('admin.transaksi') }}">Transaksi</a></li>
          <li role="presentation" class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  {{ Auth::user()->username }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
      @endguest
  </ul>
  </div>
@endsection
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
