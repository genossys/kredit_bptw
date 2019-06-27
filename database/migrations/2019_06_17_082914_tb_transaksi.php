<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_proseskredit', function(Blueprint $table){
            $table->increments('id')->index();
            $table->string('kode_proses', '191')->unique();
            $table->string('nik_kreditur', '191');
            $table->string('id_rumah', '191');
            $table->date('tanggal');
            $table->bigInteger('dp')->default('0');
            $table->bigInteger('angsuran')->default('0');
            $table->Integer('top')->default('0');
            $table->enum('status',['pending','acc','tolak'])->default('pending');
            $table->timestamps();
        });

        Schema::create('tb_angsuran', function(Blueprint $table){
            $table->increments('id')->index();
            $table->string('kode_angsuran','191')->unique();
            $table->string('kode_proses', '191')->unique();
            $table->date('tanggal');
            $table->bigInteger('angsuran')->default('0');
            $table->bigInteger('denda')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('tb_proseskredit');
        Schema::dropIfExists('tb_angsuran');
    }
}
