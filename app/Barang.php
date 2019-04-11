<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Barang extends Model
{
	use Sortable;
    protected $fillable = [
        'nama', 'jenis', 'supplier', 'harga',
    ];
    public $sortable = ['id', 'nama', 'jenis', 'supplier', 'harga', 'created_at', 'updated_at'];
}
