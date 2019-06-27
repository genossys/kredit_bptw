<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    //
    protected $table = 'tb_rumah';
    protected $fillable = ['idRumah', 'namaRumah', 'hargaJual', 'lokasi', 'deskripsi', 'urlFoto'];
    protected $primaryKey = 'idRumah';
    public $incrementing = false;
}
