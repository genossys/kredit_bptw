<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelasiTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_proseskredit', function (Blueprint $table) {
            $table->foreign('nik_kreditur', 'id_kreditur_ifk')->references('nik')->on('tb_kreditur')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_proseskredit', function (Blueprint $table) {
            $table->foreign('id_rumah', 'id_rumah_ifk')->references('idRumah')->on('tb_rumah')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_angsuran', function (Blueprint $table) {
            $table->foreign('kode_proses', 'kode_proses_ifk')->references('kode_proses')->on('tb_proseskredit')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::table('tb_proseskredit', function(Blueprint $table){
            $table->dropForeign( 'id_kreditur_ifk');
            $table->dropForeign( 'id_rumah_ifk');
        });
        Schema::table('tb_angsuran', function(Blueprint $table){
            $table->dropForeign( 'kode_proses_ifk');
        });
    }
}
