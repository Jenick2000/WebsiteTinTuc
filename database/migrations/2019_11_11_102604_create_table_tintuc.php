<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TieuDe');
            $table->string('TomTat');
            $table->string('TieuDeKhongDau');
            $table->string('NoiDung');
            $table->string('Hinh');
            $table->integer('NoiBat');
            $table->integer('SoLuotXem');
            $table->bigInteger('idLoaiTin')->unsigned();
            $table->foreign('idLoaiTin')->references('id')->on('loaitin');
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
        Schema::dropIfExists('table_tintuc');
    }
}
