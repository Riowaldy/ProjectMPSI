@extends('layouts.appadmin')

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
                      {{ csrf_field() }}
                      <td><button type="button" title="Tambah Data" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambah_pelanggan">Tambah Pelanggan</button></td>
                      <td></td>
                    <tr>
                    @foreach($pelanggans as $pelanggan)
                    <tr>
                      <td>{{ $pelanggan->nama }}</td>
                      <td>{{ $pelanggan->alamat }}</td>
                      <td>{{ $pelanggan->no_tlp }}</td>
                      <td>
                        <button type="submit" title="Update" class="btn btn-xs btn-info" data-id="{{$pelanggan->id}}" data-nama="{{$pelanggan->nama}}" data-alamat="{{$pelanggan->alamat}}" data-no_tlp="{{$pelanggan->no_tlp}}" data-toggle="modal" data-target="#update_pelanggan">&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;</button> &nbsp;
                        <button type="submit" title="Delete" class="btn btn-xs btn-danger" data-id="{{$pelanggan->id}}" data-toggle="modal" data-target="#hapus_pelanggan">&nbsp;Delete&nbsp;</button>
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
                <label for="input_nama">ID Barang</label>
                <input type="text" name="barang_id" id="barang_id" class="form-control" placeholder="Tulis ID Barang">
              </div>
              <div class="form-group">
                <label for="input_nama">Ukuran</label>
                <input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="Tulis Ukuran Barang">
              </div>
              <div class="form-group">
                <label for="input_nama">Harga Total</label>
                <input type="text" name="harga_total" id="harga_total" class="form-control" placeholder="Tulis Harga Barang">
              </div>   

              <!-- <div class="form-group">
                <select name="jenisbarang" id="jenis_barang" class="form-control dynamic" data-dependent="namabarang">
                 <option value="">Pilih Jenis Barang</option>
                   @foreach($barang as $barang)
                    <option value="{{ $barang->jenis}}">{{ $barang->jenis }}</option>
                   @endforeach
                </select>
              </div>

              <div class="form-group">
                <select name="namabarang" id="nama_barang" class="form-control dynamic" data-dependent="hargabarang">
                 <option value="">Pilih Nama Barang</option>
                  @foreach($barangg as $baran)
                    <option value="{{ $baran->id}}">{{ $baran->nama }}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <select name="hargabarang" id="hargabarang" class="form-control">
                 <option value="">Pilih Harga</option>
                 @foreach($barangg as $baran)
                    <option value="{{ $baran->id}}">{{ $baran->harga }}</option>
                  @endforeach
                </select>
              </div>
              {{ csrf_field() }} -->
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
<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('admin.tambahPelanggan.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#jenisbarang').change(function(){
  $('#namabarang').val('');
  $('#hargabarang').val('');
 });

 $('#namabarang').change(function(){
  $('#hargabarang').val('');
 });

 

});
</script>
@endsection
