<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrlFoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_kreditur', function (Blueprint $table) {
            //
            $table->string('urlFoto','191')->after('password');
        });

        Schema::table('tb_rumah', function (Blueprint $table) {
            //
            $table->string('urlFoto','191')->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_kreditur', function (Blueprint $table) {
            //
            $table->dropColumn('urlFoto');
        });

        Schema::table('tb_rumah', function (Blueprint $table) {
            //
            $table->dropColumn('urlFoto');
        });
    }
}
