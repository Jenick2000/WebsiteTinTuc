<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
class tinTucController extends Controller
{
    public function getlist(){
        $tintuc = TinTuc::orderBy('id','DESC')->get();
         // url 
         $Breadcrumbs = 'Tin tuc';
         $breadcrumb = ' / Danh Sách';
         $url = 'admin/tintuc/list';
        return view('admin.page-tintuc.list',['tintuc'=>$tintuc,'Breadcrumbs'=>$Breadcrumbs,'breadcrumb'=>$breadcrumb,'url'=>$url]);
    }
    public function getadd(){
        $theloai = TheLoai::all(); 
        // url 
        $Breadcrumbs = 'Tin tuc';
        $breadcrumb = ' / Thêm Tin Tức';
        $url = 'admin/tintuc/list';     
        return view('admin.page-tintuc.add',['theloai'=>$theloai,'Breadcrumbs'=>$Breadcrumbs,'breadcrumb'=>$breadcrumb,'url'=>$url]);
    } 
    public function postadd(Request $request){
        $validatedData = $request->validate([
            'tieude' => ['required','min:4', 'max:255'],
            'noidung' => ['required','min:100'],
            'tomtat' => ['required','min:20']
            //'hinh' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ],
        [
            'tieude.min'=> 'Tiêu đề cần có ít nhất 4 chữ!',
            'noidung.required'=>'Nội dung không được để trống!',
            'noidung.min'=>'Nội dung phải có ít nhất 100 ký tự!',
            'tomtat.required'=>'Tóm tắt không được để trống!',
            'tomtat.min'  => 'Tóm tắt phải có ít nhất 20 ký tự'
        ]
        );
        $tintuc = new TinTuc;

        $tintuc->idLoaiTin = $request->loaitin;
        $tintuc->TieuDe = $request->tieude;
        $tintuc->TieuDeKhongDau = utf8tourl(utf8convert($request->tieude));
        $tintuc->TomTat = $request->tomtat;
        $tintuc->NoiDung = $request->noidung;
        $tintuc->NoiBat = $request->noibat;
       
        if($request->hinh!=""){
            if($request->hinh->getSize()  <= 2000000 ){
                if ($request->hasFile('hinh')) {
                    
                    $file = $request->hinh;
                    $name = $file->getClientOriginalName();
                    $Hinh = Str::random(4).'_'.$name;
                    $extension = $file->extension();            
                    if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
                        return back()->withErrors(['bạn chỉ được chọn file có đuôi jpg, png hoặc jpeg']);
                    }       
                    while(file_exists('upload/tintuc/'.$Hinh)){
                        $Hinh = Str::random(4).'_'.$name; 
                    }
                    $file->move('upload/tintuc',$Hinh);           
                    $tintuc->Hinh = $Hinh;              
                }else{
                    $tintuc->Hinh = "";
                }
            }else{
                return redirect()->back()->withErrors(['File upload qua lon (kich co nen < 2M) !']);
            }
         }
        $tintuc->save();
         return redirect('admin/tintuc/list')->with('thongbao','Đã thêm thành công tin tức mới');

        
    }
    public function getedit($id){
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::where('idTheLoai',$tintuc->loaitin->theloai->id)->get();
        // url 
        $Breadcrumbs = 'Tin tuc';
        $breadcrumb = ' / Edit Tin Tức';
        $url = 'admin/tintuc/list'; 
       return view('admin.page-tintuc.edit',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin,'Breadcrumbs'=>$Breadcrumbs,'breadcrumb'=>$breadcrumb,'url'=>$url]);
    }
    public function postedit(Request $request,$id){
        $validatedData = $request->validate([
            'tieude' => ['required','min:4', 'max:255'],
            'noidung' => ['required','min:100'],
            'tomtat' => ['required','min:20']
        ],
        [
            'tieude.min'=> 'Tiêu đề cần có ít nhất 4 chữ!',
            'noidung.required'=>'Nội dung không được để trống!',
            'noidung.min'=>'Nội dung phải có ít nhất 100 ký tự!',
            'tomtat.required'=>'Tóm tắt không được để trống!',
            'tomtat.min'  => 'Tóm tắt phải có ít nhất 20 ký tự'
        ]
        );
        $tintuc = TinTuc::find($id);

        $tintuc->idLoaiTin = $request->loaitin;
        $tintuc->TieuDe = $request->tieude;
        $tintuc->TieuDeKhongDau = utf8tourl(utf8convert($request->tieude));
        $tintuc->TomTat = $request->tomtat;
        $tintuc->NoiDung = $request->noidung;
        $tintuc->NoiBat = $request->noibat;
        if($request->hinh!=""){
        if($request->hinh->getSize()  <= 2000000 ){
            if ($request->hasFile('hinh')) {
                
                $file = $request->hinh;
                $name = $file->getClientOriginalName();
                $Hinh = Str::random(4).'_'.$name;
                $extension = $file->extension();            
                if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg'){
                    return back()->withErrors(['bạn chỉ được chọn file có đuôi jpg, png hoặc jpeg']);
                }       
                File::delete('upload/tintuc/'.$tintuc->Hinh);// xoa file hinh anh cu
            
                while(file_exists('upload/tintuc/'.$Hinh)){
                    $Hinh = Str::random(4).'_'.$name; 
                }
                $file->move('upload/tintuc',$Hinh);           
                $tintuc->Hinh = $Hinh;              
            }
        }else{
            return redirect()->back()->withErrors(['File upload qua lon (kich co nen < 2M) !']);
        }
        }

       $tintuc->save();
        return redirect('admin/tintuc/list')->with('thongbao','Đã cập nhật thành công tin tức ');
        

    }
    public function getdelete($id){
        $tintuc = TinTuc::find($id);
       
        File::delete('upload/tintuc/'.$tintuc->Hinh); // xoa file hinh anh cu
        $tintuc->delete();
        return redirect('admin/tintuc/list')->with('thongbao','Đã xóa thành công một tin tức');
    }
}
