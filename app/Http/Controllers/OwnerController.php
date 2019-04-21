<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Pelanggan;
use App\Transaksi;
use App\User;
use App\Admin;
use DB;
use PDF;

class OwnerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('home', compact('barangs'));
    }

    public function ownerPelanggan()
    {
        $pelanggans = Pelanggan::sortable()->paginate(10);
        return view('ownerPelanggan', compact('pelanggans'));
    }

    public function ownerTransaksi()
    {
        $transaksis = Transaksi::sortable()->paginate(10);
        return view('ownerTransaksi', compact('transaksis'));
    }

    // METHOD CETAK PDF BARANG
    function indexBarangPDF()
    {
     $barangs = $this->get_post_data_barang();
     return view('dynamic_pdf')->with('barangs', $barangs);
    }

    function get_post_data_barang()
    {
     $barangs = DB::table('barangs')
         ->get();
     return $barangs;
    }

    function pdfBarangPDF()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_post_data_barang_to_html());
     return $pdf->stream();
    }

    function convert_post_data_barang_to_html()
    {
     $barangs = $this->get_post_data_barang();
     $output = '
     <h3 align="center">Data Barang</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="3%">ID</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="15%">Nama Barang</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="7%">Jenis</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="20%">Supplier</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="10%">Harga</th>
   </tr>
     ';  
     foreach($barangs as $barang)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$barang->id.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$barang->nama.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$barang->jenis.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$barang->supplier.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">Rp.'.$barang->harga.',00</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    // AKHIR METHOD CETAK PDF BARANG

    // METHOD CETAK PDF PELANGGAN
    function indexPelangganPDF()
    {
     $pelanggans = $this->get_post_data_pelanggan();
     return view('dynamic_pdf')->with('pelanggans', $pelanggans);
    }

    function get_post_data_pelanggan()
    {
     $pelanggans = DB::table('pelanggans')
         ->get();
     return $pelanggans;
    }

    function pdfPelangganPDF()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_post_data_pelanggan_to_html());
     return $pdf->stream();
    }

    function convert_post_data_pelanggan_to_html()
    {
     $pelanggans = $this->get_post_data_pelanggan();
     $output = '
     <h3 align="center">Data Pelanggan</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="15%">Nama</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="20%">Alamat</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="15%">Nomor Telepon</th>
   </tr>
     ';  
     foreach($pelanggans as $pelanggan)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$pelanggan->nama.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$pelanggan->alamat.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$pelanggan->no_tlp.'</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    // AKHIR METHOD CETAK PDF PELANGGAN

    // METHOD CETAK PDF TRANSAKSI
    function indexTransaksiPDF()
    {
     $transaksis = $this->get_post_data_transaksi();
     return view('dynamic_pdf')->with('transaksis', $transaksis);
    }

    function get_post_data_transaksi()
    {
     $transaksis = DB::table('transaksis')
        ->select('pelanggans.nama as a1','barangs.nama as a2','transaksis.ukuran','transaksis.harga_total')
        ->join('pelanggans','transaksis.pelanggan_id','=','pelanggans.id')
        ->join('barangs','transaksis.barang_id','=','barangs.id')
         ->get();
    return ($transaksis);
    }

    function pdfTransaksiPDF()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_post_data_transaksi_to_html());
     return $pdf->stream();
    }

    function convert_post_data_transaksi_to_html()
    {
        
     $transaksis = $this->get_post_data_transaksi();
     $output = '
     <h3 align="center">Data Transaksi</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="15%">Nama Pelanggan</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="15%">Nama Barang</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="10%">Ukuran</th>
    <th style="border: 1px solid; padding:12px; text-align:center;" width="15%">Total Harga</th>
   </tr>
     ';  
     foreach($transaksis as $transaksi)
     {
       
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$transaksi->a1.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$transaksi->a2.'</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">'.$transaksi->ukuran.' m</td>
       <td style="border: 1px solid; padding:12px; text-align:center;">Rp.'.$transaksi->harga_total.',00</td>
      </tr>
      ';
     }
     $output .= '</table>';
     return $output;
    }
    // AKHIR METHOD CETAK PDF TRANSAKSI
}
