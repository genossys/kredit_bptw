<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrigerUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('CREATE TRIGGER BIkreditur BEFORE INSERT ON `tb_kreditur` FOR EACH ROW
                BEGIN
                    INSERT INTO `tb_user` (`email`, `username`, `nama`,`password` , `hakAkses` , `created_at`, `updated_at`) VALUES (NEW.email, NEW.username, NEW.nama, NEW.password, \'kreditur\' , NEW.created_at, NEW.updated_at);
                END');

        DB::unprepared('CREATE TRIGGER ADkreditur AFTER DELETE ON `tb_kreditur` FOR EACH ROW
                BEGIN
                    DELETE FROM `tb_user` WHERE `tb_user`.`username` = OLD.username;
                END');

        DB::unprepared('CREATE TRIGGER BIbank BEFORE INSERT ON `tb_bank` FOR EACH ROW
                BEGIN
                    INSERT INTO `tb_user` (`email`, `username`, `nama`,`password` , `hakAkses` , `created_at`, `updated_at`) VALUES (NEW.email, NEW.username, NEW.nama, NEW.password, \'kreditur\' , NEW.created_at, NEW.updated_at);
                END');

        DB::unprepared('CREATE TRIGGER ADbank AFTER DELETE ON `tb_bank` FOR EACH ROW
                BEGIN
                    DELETE FROM `tb_user` WHERE `tb_user`.`username` = OLD.username;
                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP TRIGGER `BIkreditur`');
        DB::unprepared('DROP TRIGGER `ADkreditur`');
        DB::unprepared('DROP TRIGGER `BIbank`');
        DB::unprepared('DROP TRIGGER `ADbank`');
    }
}
