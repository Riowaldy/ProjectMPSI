<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CV. TITA JAYA</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap-theme.min.css" integrity="sha384-jzngWsPS6op3fgRCDTESqrEJwRKck+CILhJVO5VvaAZCq8JYf8HsR/HPpBOOPZfR" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous">
    </script>
    
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/parsley.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand">
                        CV. TITA JAYA
                    </a>
                </div>
                @yield('navbar')
                
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

    <script>
        $('#tambah_transaksi').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var pelanggan_id = button.data('pelanggan_id')
          var nama_pelanggan = button.data('nama_pelanggan')
          var modal = $(this)
          modal.find('.modal-body #pelanggan_id').val(pelanggan_id);
          modal.find('.modal-body #nama_pelanggan').val(nama_pelanggan);
        })
        $('#update_barang').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var nama = button.data('nama') 
          var jenis = button.data('jenis')
          var supplier = button.data('supplier')
          var harga = button.data('harga') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #jenis').val(jenis);
          modal.find('.modal-body #supplier').val(supplier);
          modal.find('.modal-body #harga').val(harga);
        })
        $('#update_pelanggan').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var nama = button.data('nama') 
          var alamat = button.data('alamat')
          var no_tlp = button.data('no_tlp')
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
          modal.find('.modal-body #nama').val(nama);
          modal.find('.modal-body #alamat').val(alamat);
          modal.find('.modal-body #no_tlp').val(no_tlp);
        })
        $('#hapus_barang').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
        $('#hapus_pelanggan').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('id') 
          var modal = $(this)
          modal.find('.modal-body #id').val(id);
        })
    </script>
</body>
</html>
