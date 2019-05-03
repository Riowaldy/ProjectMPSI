@extends('layouts.app')
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
          <li><a href="{{ route('login') }}">Login</a></li>
      @else
          <li role="presentation"><a href="{{ route('home') }}">Beranda</a></li>
          <li role="presentation" class="active"><a href="{{ route('owner.pelanggan') }}">Pelanggan</a></li>
          <li role="presentation"><a href="{{ route('owner.transaksi') }}">Transaksi</a></li>
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
