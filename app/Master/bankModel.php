<?php

namespace App\Master;

use Illuminate\Database\Eloquent\Model;

class bankModel extends Model
{
    //
    protected $table = 'tb_bank';
    protected $fillable = ['email', 'nama', 'alamat', 'contact', 'nohp', 'password'];
    protected $primaryKey = 'id';
    public $incrementing = false;
}
