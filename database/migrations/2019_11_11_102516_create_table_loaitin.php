<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLoaitin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaitin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Ten');
            $table->string('TenKhongDau');
            $table->bigInteger('idTheLoai')->unsigned();
            $table->foreign('idTheLoai')->references('id')->on('theloai');      
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
        Schema::dropIfExists('table_loaitin');
    }
}
