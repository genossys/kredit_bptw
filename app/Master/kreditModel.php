<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class kreditModel extends Model
{
    //
    protected $table = 'tb_kredit';
    protected $fillable = ['id', 'noKontrak', 'idKreditur', 'idRumah', 'idBank','tanggal','dp','angsuran','top','status'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
}
