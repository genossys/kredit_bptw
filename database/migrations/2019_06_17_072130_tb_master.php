<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('tb_kreditur', function(Blueprint $table){
            $table->bigIncrements('id')->index();
            $table->string('nik', '191')->unique();
            $table->string('username', '191')->unique();
            $table->string('nama', '191');
            $table->string('email', '191')->unique();
            $table->text('alamat');
            $table->date('tgl_lahir')->unique();
            $table->string('nohp','15');
            $table->string('password','191');
            $table->timestamps();
        });

        Schema::create('tb_bank', function(Blueprint $table){
            $table->bigIncrements('id')->index();
            $table->string('username', '191')->unique();
            $table->string('email', '191')->unique();
            $table->string('nama', '191');
            $table->text('alamat');
            $table->string('contact','50');
            $table->string('nohp','15');
            $table->string('password','191');
            $table->timestamps();
        });

        Schema::create('tb_user', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('email', '191')->unique();
            $table->string('username', '191')->unique();
            $table->string('nama', '191');
            $table->string('password','191');
            $table->enum('hakAkses',['bank','admin','kreditur'])->default('kreditur');
            $table->timestamps();
        });

        Schema::create('tb_rumah', function(Blueprint $table){
            $table->string('idRumah','15')->primary();
            $table->string('namaRumah','255');
            $table->bigInteger('hargaJual')->default('0');
            $table->text('lokasi');
            $table->text('deskripsi');
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
        Schema::dropIfExists('tb_bank');
        Schema::dropIfExists('tb_user');
        Schema::dropIfExists('tb_rumah');
        Schema::dropIfExists('tb_kreditur');
    }
}
