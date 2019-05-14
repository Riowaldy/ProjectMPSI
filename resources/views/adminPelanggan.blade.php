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
          <li role="presentation" class="active"><a href="{{ route('admin.pelanggan') }}">Pelanggan</a></li>
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
              <div class="panel-heading"><b><center><h4>Data Pelanggan</h4></center></b>

              </div>
              
                <!-- Table -->
                <table class="table">
                    <tr>
                      <th><b>@sortablelink('nama')</b></th>
                      <th><b>@sortablelink('alamat')</b></th>
                      <th><b>@sortablelink('no_tlp', 'Nomor Telepon')</b></th>
                      {{ csrf_field() }}
                      <th><button type="button" title="Tambah Data" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambah_pelanggan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></th>
                      <th></th>
                    <tr>
                    @foreach($pelanggans as $pelanggan)
                    <tr>
                      <td>{{ $pelanggan->nama }}</td>
                      <td>{{ $pelanggan->alamat }}</td>
                      <td>{{ $pelanggan->no_tlp }}</td>
                      <td>
                        <button type="submit" title="Update" class="btn btn-xs btn-info" data-id="{{$pelanggan->id}}" data-nama="{{$pelanggan->nama}}" data-alamat="{{$pelanggan->alamat}}" data-no_tlp="{{$pelanggan->no_tlp}}" data-toggle="modal" data-target="#update_pelanggan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button> &nbsp;
                        <button type="submit" title="Delete" class="btn btn-xs btn-danger" data-id="{{$pelanggan->id}}" data-toggle="modal" data-target="#hapus_pelanggan"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                      </td>
                      <td>
                        <button type="button" title="Transaksi" class="btn btn-xs btn-info" data-pelanggan_id="{{$pelanggan->id}}" data-nama_pelanggan="{{$pelanggan->nama}}" data-toggle="modal" data-target="#tambah_transaksi">Transaksi</button>
                      </td>
                    </tr>
                    @endforeach
                </table>
                
            </div>
            {!! $pelanggans->appends(\Request::except('page'))->render() !!}
        </div>
    </div>
</div>

<!-- Modal Create Pelanggan-->
  <div class="modal fade" id="tambah_pelanggan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="emyModalLabel"><center>Tambah Data Pelanggan</center></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Create Pelanggan-->
          <form role="form" action="{{route('admin.tambahPelanggan')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
            
              <div class="form-group">
                <label for="input_nama">Nama Pelanggan</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Tulis Nama Pelanggan">
              </div>
              <div class="form-group">
                <label for="input_nama">Alamat Pelanggan</label>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Tulis Alamat Pelanggan">
              </div>  
              <div class="form-group">
                <label for="input_nama">No Telepon</label>
                <input type="text" name="no_tlp" id="no_tlp" class="form-control" placeholder="Tulis Nomor Telepon">
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
  <!-- Akhir Modal Create Pelanggan-->

  <!-- Modal Create Transaksi-->
  <div class="modal fade" id="tambah_transaksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="emyModalLabel"><center>Tambah Data Transaksi</center></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Create Transaksi-->
          <form role="form" action="{{route('admin.tambahTransaksi')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
            
              <div class="form-group">
                <input type="hidden" name="pelanggan_id" id="pelanggan_id" class="form-control" value="" readonly>
              </div>
              <div class="form-group">
                <label for="input_nama">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="" readonly>
              </div>
              
              <div class="form-group">
                <label for="input_nama">Nama Barang</label>
                <select name="barang_id" id="barang_id" class="form-control dynamic">
                 <option value="">Pilih Nama Barang</option>
                   @foreach($barang as $b)
                    <option value="{{ $b->id}}">{{ $b->nama }}</option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="input_nama">Ukuran</label>
                <input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="Tulis Ukuran Barang">
              </div>
              <div class="form-group">
                <label for="input_nama">Harga Total</label>
                <input type="text" name="harga_total" id="harga_total" class="form-control" placeholder="Tulis Harga Barang">
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
  <!-- Akhir Modal Create Transaksi-->

  <!-- Modal Update-->
  <div class="modal fade" id="update_pelanggan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="emyModalLabel"><center>Update Data Pelanggan</center></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Update-->
        <form role="form" action="{{route('admin.updatePelanggan')}}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}
              <div class="form-group">
                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
              </div>

              <div class="form-group">
                  <label for="input_nama">Nama Pelanggan</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="">
              </div>

              <div class="form-group">
                  <label for="input_nama">Alamat Pelanggan</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" value="">
              </div>

              <div class="form-group">
                  <label for="input_nama">Nomor Telepon Pelanggan</label>
                  <input type="text" name="no_tlp" id="no_tlp" class="form-control" value="">
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
    <div class="modal fade" id="hapus_pelanggan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="emyModalLabel"><center>Hapus Data Pelanggan</center></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                
  <!--Form Dalam Modal Delete -->
          <form role="form" action="{{ route('admin.deletePelanggan') }}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
              <div class="form-group">
                <input type="hidden" name="id" id="id" class="form-control" value="" readonly>
              </div>
              <div class="modal-body">
                <p class="text-center">Apa anda yakin ingin menghapus data pelanggan ini?</p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection

