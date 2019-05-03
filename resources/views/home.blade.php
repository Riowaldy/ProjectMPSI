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
          <li role="presentation" class="active"><a href="{{ route('home') }}">Beranda</a></li>
          <li role="presentation"><a href="{{ route('owner.pelanggan') }}">Pelanggan</a></li>
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
