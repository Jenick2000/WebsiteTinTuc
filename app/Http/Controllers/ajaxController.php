<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\Tintuc;
class ajaxController extends Controller
{
    public function getloaitin($idTheLoai){
        $loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
        foreach($loaitin as $item){
            echo  '<option value="'.$item->id.'">'.$item->Ten.'</option>';
        }
    }
    public function getLoadMore($idLoaiTin ,$i){
        $tintuc = TinTuc::where('idLoaiTin',$idLoaiTin)->orderBy('NoiBat','DESC')->orderBy('created_at', 'DESC')->limit($i)->get();
        foreach($tintuc as $item){
            echo '<div class="flex-wr-sb-s p-t-40 p-b-15 how-bor2">
            <a href="blog-detail-02.html" class="size-w-8 wrap-pic-w hov1 trans-03 w-full-sr575 m-b-25">
            <img src="upload/tintuc/'.$item->Hinh.'" alt="IMG">
            </a>

            <div class="size-w-9 w-full-sr575 m-b-25">
                <h5 class="p-b-12">
                    <a href="blog-detail-02.html" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                        '.$item->TieuDe.'
                    </a>
                </h5>

                <div class="cl8 p-b-18">
                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                        by John Alvarado
                    </a>

                    <span class="f1-s-3 m-rl-3">
                        -
                    </span>

                    <span class="f1-s-3">
                       '.$item->created_at->toFormattedDateString().'
                    </span>
                </div>

                <p class="f1-s-1 cl6 p-b-24" style="padding-bottom:inherit;">
                    '.$item->TomTat .'
                </p>	

                <a href="blog-detail-02.html" class="f1-s-1 cl9 hov-cl10 trans-03">
                    Read More
                    <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
                </a>
            </div>
        </div> ';
        }
    }
     // dem nguoi dung xem tin tuc
     public function visitCount(Request $request,$id){
         $blogKey = 'blog_'.$id;
        if (!$request->session()->has($blogKey)) {
            $tintuc=TinTuc::find($id);                    
            $tintuc->increment('SoLuotXem');
            $tintuc->timestamps = false;
            $tintuc->save();
            $request->session()->put($blogKey ,1);
        }   
    }
}
