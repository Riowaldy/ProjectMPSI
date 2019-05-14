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
          <li role="presentation" class="active"><a href="{{ route('admin.home') }}">Beranda</a></li>
          <li role="presentation"><a href="{{ route('admin.pelanggan') }}">Pelanggan</a></li>
          <li role="presentation"><a href="{{ route('admin.transaksi') }}">Transaksi</a></li>
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
            <div class="panel panel-primary">
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
                      {{ csrf_field() }}
                      <th><button type="button" title="Tambah Data" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambah_barang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></th>
                    <tr>
                    @foreach($barangs as $barang)
                    <tr>
                      <td>{{ $barang->nama }}</td>
                      <td>{{ $barang->jenis }}</td>
                      <td>{{ $barang->supplier }}</td>
                      <td>Rp.{{ $barang->harga }},00</td>
                      <td>
                        <button type="submit" title="Update" class="btn btn-xs btn-info" data-id="{{$barang->id}}" data-nama="{{$barang->nama}}" data-jenis="{{$barang->jenis}}" data-supplier="{{$barang->supplier}}" data-harga="{{$barang->harga}}" data-toggle="modal" data-target="#update_barang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button> &nbsp;
                        <button type="submit" title="Delete" class="btn btn-xs btn-danger" data-id="{{$barang->id}}" data-toggle="modal" data-target="#hapus_barang"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                      </td>
                    </tr>
                    @endforeach
                </table>
                
            </div>
            {!! $barangs->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
</div>

<!-- Modal Create-->
  <div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="emyModalLabel"><center>Tambah Data Barang</center></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Create-->
          <form role="form" action="{{route('admin.tambahBarang')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
            
              <div class="form-group">
                <label for="input_nama">Nama Barang</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis Nama Barang">
              </div>
              <div class="form-group">
                <label for="input_nama">Jenis Barang</label>
                <input type="text" name="jenis" id="jenis" class="form-control" placeholder="Tulis Jenis Barang">
              </div>  
              <div class="form-group">
                <label for="input_nama">Nama Supplier</label>
                <input type="text" name="supplier" id="supplier" class="form-control" placeholder="Tulis Nama Supplier">
              </div>
              <div class="form-group">
                <label for="input_nama">Harga Barang</label>
                <input type="text" name="harga" id="harga" class="form-control" placeholder="Tulis Harga Barang">
              </div>
                
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal Create -->

  <!-- Modal Update-->
  <div class="modal fade" id="update_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="emyModalLabel"><center>Update Data Barang</center></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Update-->
        <form role="form" action="{{route('admin.updateBarang')}}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
              <div class="form-group">
                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
              </div>

              <div class="form-group">
                  <label for="input_nama">Nama Barang</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="">
              </div>

              <div class="form-group">
                  <label for="input_nama">Jenis Barang</label>
                  <input type="text" name="jenis" id="jenis" class="form-control" value="">
              </div>

              <div class="form-group">
                  <label for="input_nama">Supplier Barang</label>
                  <input type="text" name="supplier" id="supplier" class="form-control" value="">
              </div>

              <div class="form-group">
                  <label for="input_nama">Harga Barang</label>
                  <input type="text" name="harga" id="harga" class="form-control" value="">
              </div>
                    
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal Update -->

  <!-- Modal Delete -->
    <div class="modal fade" id="hapus_barang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="emyModalLabel"><center>Hapus Data Barang</center></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Delete -->
          <form role="form" action="{{ route('admin.deleteBarang') }}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
              <div class="form-group">
                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
              </div>
              <div class="modal-body">
                <p class="text-center">Apa anda yakin ingin menghapus data barang ini?</p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Akhir Modal Delete -->
@endsection
