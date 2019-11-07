<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
class theLoaiController extends Controller
{
    //
    public function getlist(){
        $theloai = TheLoai::all();
        return view('admin.page-theloai.list',['theloai'=>$theloai,'Breadcrumbs'=>'Thể loại','breadcrumb'=>' / Danh sách','url'=>'admin/theloai/list']);
    }
    public function getadd(){
    return view('admin.page-theloai.add',['Breadcrumbs'=>'Thể Loại','breadcrumb'=>' / Thêm Thể Loại','url'=>'admin/theloai/list']);
    }
    public function postadd(Request $request){
       
        $validatedData = $request->validate([
            'tentheloai' => 'required|min:4|max:255',
        ],
        [
            'tentheloai.required' => 'Bạn cần nhập tên thể loại tin!',
            'tentheloai.min' => ' Tên thể loại tin phải có ít nhất 4 ký tự!',
            'tentheloai.max' => 'Tên thể loại có dưới 100 ký tự !'
        ]  
        );
       $theloai = new TheLoai;
       $theloai->Ten = $request->tentheloai;
       $theloai->TenKhongDau = utf8tourl(utf8convert($request->tentheloai));
    
       $theloai->save();
       return back()
            ->with('thanhcong', 'Đã thêm thể loại tin thành công');
        
    }

    //ham xoa
    public function getdelete($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
         return redirect('admin/theloai/list')->with('thongbao','Đã xóa thành công ');
    }
    public function getedit($id){
        $theloai = TheLoai::find($id);
        // url 
        $Breadcrumbs = 'Thể Loại';
        $breadcrumb = ' / Sửa Thể Loại';
        $bread = $theloai->Ten;
        $url = 'admin/theloai/list';
        return view('admin.page-theloai.edit',['theloai'=>$theloai,'Breadcrumbs'=>$Breadcrumbs,'breadcrumb'=>$breadcrumb,'bread'=>$bread,'url'=>$url]);
    }
    public function postedit(Request $request ,$id){
        $validatedData = $request->validate([
            'tentheloai' => 'required|min:4|max:255',
        ],
        [
            'tentheloai.required' => 'Bạn cần nhập tên thể loại tin!',
            'tentheloai.min' => ' Tên thể loại tin phải có ít nhất 4 ký tự!',
            'tentheloai.max' => 'Tên thể loại có dưới 100 ký tự !'
        ]  
        );
        $theloai = TheLoai::find($id);
        $theloai->Ten = $request->tentheloai;
        $theloai->TenKhongDau = utf8tourl(utf8convert($request->tentheloai));
        $theloai->created_at = $theloai->created_at;
        $theloai->updated_at = now();
        
        $theloai->save();
        return back()->with('updated','Đã sữa thành công Thể Loại');
    }
}
