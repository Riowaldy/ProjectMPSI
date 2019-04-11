<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Transaksi extends Model
{
    use Sortable;
    protected $fillable = [
        'pelanggan_id', 'barang_id', 'ukuran', 'harga_total',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

}
