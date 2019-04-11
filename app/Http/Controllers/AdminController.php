<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pelanggan;
use App\Transaksi;
use App\User;
use App\Admin;
use DB;

class AdminController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // View
    public function index()
    {
        $barangs = Barang::sortable()->paginate(10);
        return view('admin', compact('barangs'));
    }

    public function adminPelanggan()
    {
        $pelanggans = Pelanggan::sortable()->paginate(10);
        $barang = DB::table('barangs')
         ->groupBy('jenis')
         ->get();
        $barangg = Barang::all();
        $barang1 = DB::table('barangs')
         ->where('jenis','wallpaper')
         ->get();
        $barang2 = DB::table('barangs')
         ->where('jenis','blinds')
         ->get();
        $barang3 = DB::table('barangs')
         ->where('jenis','gorden')
         ->get();
        return view('adminPelanggan', compact('pelanggans','barang','barangg','barang1','barang2','barang3'));
    }

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('barangs')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }

    public function adminTransaksi()
    {
        $transaksis = Transaksi::sortable()->paginate(10);
        $pelanggans = Pelanggan::all();
        $barangs = Barang::all();
        return view('adminTransaksi', compact('transaksis','pelanggans','barangs'));
    }


    // Create
    public function AdminBarangStore(Request $request)
    {
        $this->validate($request, array(
            'nama' => 'required',
            'jenis' => 'required',
            'supplier' => 'required',
            'harga' => 'required'
        ));
        $barang = new Barang;
        $barang->nama = $request->nama;
        $barang->jenis = $request->jenis;
        $barang->supplier = $request->supplier;
        $barang->harga = $request->harga;
        
        $barang->save();
        return back()->with('alert', 'Barang Berhasil Ditambahkan');
    }

    public function AdminPelangganStore(Request $request)
    {
        $this->validate($request, array(
            'nama' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required'
        ));
        $pelanggan = new Pelanggan;
        $pelanggan->nama = $request->nama;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_tlp = $request->no_tlp;
        
        $pelanggan->save();
        return back()->with('alert', 'Pelanggan Berhasil Ditambahkan');
    }

    public function AdminTransaksiStore(Request $request)
    {
        $this->validate($request, array(
            'pelanggan_id' => 'required',
            'barang_id' => 'required',
            'ukuran' => 'required',
            'harga_total' => 'required'
        ));
        $transaksi = new Transaksi;
        $transaksi->pelanggan_id = $request->pelanggan_id;
        $transaksi->barang_id = $request->barang_id;
        $transaksi->ukuran = $request->ukuran;
        $transaksi->harga_total = $request->harga_total;
        
        $transaksi->save();
        return back()->with('alert', 'Transaksi Berhasil Ditambahkan');
    }


    // Update
    public function AdminUpdateBarang(Request $request){
      $updates = \DB::table('barangs')->select('id')->where('id', $request->input('id'));
      $updates->update(['nama' => $request->input('nama')]);
      $updates->update(['jenis' => $request->input('jenis')]);
      $updates->update(['supplier' => $request->input('supplier')]);
      $updates->update(['harga' => $request->input('harga')]);
      return back()->with('success');
    }

    public function AdminUpdatePelanggan(Request $request){
      $updates = \DB::table('pelanggans')->select('id')->where('id', $request->input('id'));
      $updates->update(['nama' => $request->input('nama')]);
      $updates->update(['alamat' => $request->input('alamat')]);
      $updates->update(['no_tlp' => $request->input('no_tlp')]);
      return back()->with('success');
    }


    // Delete
    public function AdminDestroyBarang(Request $request)
    {
      $delete = \DB::table('barangs')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }

    public function AdminDestroyPelanggan(Request $request)
    {
      $delete = \DB::table('pelanggans')->select('id')->where('id', $request->input('id'));

      $delete->delete();
      return back()->with('success');
    }
}
