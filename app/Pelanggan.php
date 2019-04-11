<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Pelanggan extends Model
{
    use Sortable;
    protected $fillable = [
        'nama', 'alamat', 'no_tlp',
    ];
    public $sortable = ['id', 'nama', 'alamat', 'no_tlp', 'created_at', 'updated_at'];
}
