<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table =  "theloai";

    public function loaitin()
    {
        return $this->hasMany('App\LoaiTin', 'idTheLoai' ,'id');
    }

    //get tat ca cac tin tuc tu the loai nao do

    public function tintuc()
    {
        return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin','idTheLoai','idLoaiTin','id');
    }
}
