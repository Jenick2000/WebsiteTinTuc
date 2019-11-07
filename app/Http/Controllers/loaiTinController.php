<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
class loaiTinController extends Controller
{
   public function getlist(){
    $loaitin = LoaiTin::all();
    return view('admin.page-loaitin.list',['loaitin'=>$loaitin,'Breadcrumbs'=>'Loại Tin','breadcrumb'=>' / Danh sách','url'=>'admin/loaitin/list']);
   }
   public function getadd(){
       $theloai = TheLoai::all();
       return view('admin.page-loaitin.add',['theloai'=>$theloai,'Breadcrumbs'=>'Loại Tin','breadcrumb'=>' / Thêm Loại Tin','url'=>'admin/loaitin/list']);
   }

   public function postadd(Request $request){
       
    $validatedData = $request->validate([
        'tenloaitin' => 'required|min:4|max:255',
        
    ],
    [
        'tenloaitin.required' => 'Bạn cần nhập tên loại tin tin!',
        'tenloaitin.min' => ' Tên loại tin phải có ít nhất 4 ký tự!',
        'tenloaitin.max' => 'Tên loại có dưới 100 ký tự !'
    ]  
    );
   $loaitin = new LoaiTin;
   $loaitin->Ten = $request->tenloaitin;
   $loaitin->TenKhongDau = utf8tourl(utf8convert($request->tenloaitin));
   $loaitin->idTheLoai = $request->theloai;
   $loaitin->save();
   return back()
        ->with('thanhcong', 'Đã thêm loại tin thành công');
    
    }

    public function getedit($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.page-loaitin.edit',['loaitin'=>$loaitin,'theloai'=>$theloai,'Breadcrumbs'=>'Loại Tin','breadcrumb'=>' / Sửa Loại Tin','bread'=>$loaitin->Ten,'url'=>'admin/loaitin/list']);
    }
    public function postedit(Request $request ,$id){
        $validatedData = $request->validate([
            'tenloaitin' => 'required|min:4|max:255',
            
        ],
        [
            'tenloaitin.required' => 'Bạn cần nhập tên loại tin tin!',
            'tenloaitin.min' => ' Tên loại tin phải có ít nhất 4 ký tự!',
            'tenloaitin.max' => 'Tên loại có dưới 100 ký tự !'
        ]  
        );
        $loaitin = LoaiTin::find($id);
        $loaitin->Ten = $request->tenloaitin;
        $loaitin->TenKhongDau = utf8tourl(utf8convert($request->tenloaitin));
        $loaitin->idTheLoai = $request->theloai;
        
        $loaitin->save();
        return back()->with('updated','Đã sữa thành công Thể Loại');
    }
    public function getdelete($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return back()->with('thongbao','Đã xóa thành công ');
    }

}
