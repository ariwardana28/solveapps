<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapors', function (Blueprint $table) {
            $table->bigIncrements('id_lapor');
            $table->integer('id_user');
            $table->string('keluhan');
            $table->integer('id_dinas');
            $table->string('jenis_pesan');
            $table->string('alamat');
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
        Schema::dropIfExists('lapors');
    }
}
