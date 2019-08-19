<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class angsuranModel extends Model
{
    //
    protected $table = 'tb_angsuran';
    protected $fillable = ['idAngsuran', 'noKontrak', 'idKreditur','tanggal','status'];
    protected $primaryKey = 'idAngsuran';
    public $incrementing = false;
    public $timestamps = false;
}
