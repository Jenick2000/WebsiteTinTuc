<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\User;
class pagesController extends Controller
{
    public function __construct(){//chia se du lieu cho cac view
        $theloai = TheLoai::all();
        $tintuc = TinTuc::all();
        $loaitin = LoaiTin::all();
        View::share('theloai', $theloai);
        View::share('TinTuc', $tintuc);
        View::share('LoaiTin', $loaitin);

        //check user logged
        // if(Auth::check()){
        //     View::share('User', 'Jenick');
        // }
    }
     public function home(){
        return view('pages.home');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function about(){
        return view('pages.about');
    }
    public function category($idtheloai){
        $category_theloai = TheLoai::find($idtheloai);    
        //$loaitin = LoaiTin::where('idTheLoai',$category_theloai->id)->get();
        return view('pages.category',['category_theloai'=>$category_theloai]);
    }
    // trang  loai tin
    public function typeNews($id){
       $loaitin = LoaiTin::find($id);
       $tintuc = TinTuc::where('idLoaiTin',$id)->orderBy('NoiBat','DESC')->orderBy('created_at', 'DESC')->limit(10)->get();
       $count_tintuc = count(TinTuc::where('idLoaiTin',$id)->get());
       
       return view('pages.typeNews',['loaitin'=>$loaitin, 'tintuc'=>$tintuc,'all_tintuc'=>$count_tintuc]);
    }
    // trang chi tiet tin tuc
    public function newsDetail($id){
        $tintuc = TinTuc::find($id);
        return view('pages.newsDetail',['tintuc'=>$tintuc]);
    }
    // dang nhap nguoi dung
    public function getLogin(){
        return view('pages.login');
    }
    public function postLogin(Request $request){
        $validatedData = $request->validate([
            'password' => ['required','min:6', 'max:30'],
            'email' => ['required'],           
        ],
        [
            'password.min'=> 'Password cần có ít nhất 4 ký tự!',
            'password.max'=> 'Password có tối đa 30 ký tự!'              
        ]
        );
        $credentials = [
            'email' => $request->email,
             'password' => $request->password,          
        ];
        if (Auth::attempt($credentials)) {
            // The user is active, not suspended, and exists.
            return redirect()->back()->with('thongbao','Đăng nhập thành công');
         }else{
           return redirect()->back()->withErrors(['Đăng nhập thất bại !']);
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }

    public function getUser(){
        if(Auth::check()){
            $user = Auth::user();
        return view('pages.user',['user'=>$user]);
        }else{
        return redirect('/login');
        }
    }

    public function postUser(Request $request ){
        $validatedData = $request->validate([
            'username' => ['required','min:4', 'max:30'],
            'email' => ['required'],
            
        ],
        [
            'username.min'=> 'UserName cần có ít nhất 4 chữ!',          
        ]
        );
        $userName = $request->username;
        $email = $request->email;
        $password= bcrypt($request->password);
        $confirmPassword = $request->confirmpassword;
        if(Auth::check()){
        $user = User::find(Auth::user()->id);
        $user->name = $userName;
        $user->email = $email;
        
        if($request->changePassword == 'on'){
            $validatedData = $request->validate([
                'password' => ['required','min:6','max:32'],
                'confirmpassword'=>['required','same:password']
            ],
            [               
                'password.min'  => 'Password phải có ít nhất 6 ký tự',
                'confirmpassword.same'=> 'confirmPassword không đúng vui lòng nhập lại !'
            ]
            );
            $user->password = $password;
        }   
        $user->save();
        return back()->with('updated','Đã Updated Acount thành công');
        }
    }

    public function getSignup(){
        return view('pages.signup');
    }

    public function postSignup(Request $request){
        $validatedData = $request->validate([
            'username' => ['required','min:4', 'max:30'],
            'email' => ['required'],
            'password' => ['required','min:6','max:32'],
            'confirmpassword'=>['required','same:password']
        ],
        [
            'username.min'=> 'UserName cần có ít nhất 4 chữ!',
            'password.min'  => 'Password phải có ít nhất 6 ký tự',
            'confirmpassword.same'=> 'confirmPassword không đúng vui lòng nhập lại !'
        ]
        );
        $userName = $request->username;
        $email = $request->email;
        $password= bcrypt($request->password);
        $confirmPassword = $request->confirmpassword;
        
        $user = new User;
        $user->name = $userName;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        return redirect('/')->with('thongbao','Đã Tạo User thành công');
    }
    //search 
    public function getSearch(Request $request){
        $search = $request->search ;
        $count_result =count(TinTuc::where('TieuDe','like',"%$search%")->orWhere('TomTat','like',"%$search%")->orWhere('NoiDung','like',"%$search%")->take(50)->get());
        $result = TinTuc::where('TieuDe','like',"%$search%")->orWhere('TomTat','like',"%$search%")->orWhere('NoiDung','like',"%$search%")->take(50)->paginate(5);
        return view('pages.search',['search'=>$search,'Result'=>$result, 'count_result'=>$count_result]);
    }
}
