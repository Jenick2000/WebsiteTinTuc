<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NoiDung');
            $table->bigInteger('idUser')->unsigned();
            $table->bigInteger('idTinTuc')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idTinTuc')->references('id')->on('tintuc');
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
        Schema::dropIfExists('table_comment');
    }
}
