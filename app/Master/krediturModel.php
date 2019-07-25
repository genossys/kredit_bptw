<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class krediturModel extends Model
{
    //
    protected $table = 'tb_kreditur';
    protected $fillable = ['nik', 'nama', 'email', 'alamat', 'tgl_lahir','nohp','password','urlFoto'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;
}
