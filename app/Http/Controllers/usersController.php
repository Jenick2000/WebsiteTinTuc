<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Comment;
class usersController extends Controller
{
    public function getlist(){
        $users = User::all();
        return view('admin.page-users.list',['users'=>$users]);
    }
    public function getadd(){
        //url
        $Breadcrumbs = 'Users';
        $breadcrumb = ' / Thêm User';
        $url = 'admin/users/list'; 
        return view('admin.page-users.add',['Breadcrumbs'=>$Breadcrumbs,'breadcrumb'=>$breadcrumb,'url'=>$url]);
    }
    public function postadd(Request $request){
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
        $usersRights = $request->quyen;


         //kiem tra co ton tai nguoi dung khong
         if(count(User::where('name',$userName)->get()) >0 ){
            return redirect()->back()->withErrors(['UserName này đã được sử dụng !']);
        }
        if(count(User::where('email',$email)->get()) >0){
            return redirect()->back()->withErrors(['Email này đã được sử dụng !']);
        }
        $user = new User;
        $user->name = $userName;
        $user->email = $email;
        $user->password = $password;
        $user->level = $usersRights;
        $user->save();
        return redirect('admin/users/list')->with('thongbao','Đã Tạo User thành công');
    }
    
    public function getedit($id){
        $user = User::find($id);
           // url 
           $Breadcrumbs = 'Users';
           $breadcrumb = ' / Edit User';
           $url = 'admin/users/list'; 
        return view('admin.page-users.edit',['user'=>$user,'Breadcrumbs'=>$Breadcrumbs,'breadcrumb'=>$breadcrumb,'url'=>$url]);
    }

    public function postedit(Request $request ,$id){
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
        $usersRights = $request->quyen;
        
        $user = User::find($id);
        //kiem tra co ton tai nguoi dung khong
        if($user->name != $userName && count(User::where('name',$userName)->get()) >0 ){
            return redirect()->back()->withErrors(['UserName này đã được sử dụng !']);
        }
        if($user->name != $userName && count(User::where('email',$email)->get()) >0){
            return redirect()->back()->withErrors(['Email này đã được sử dụng !']);
        }
        $user->name = $userName;
        $user->email = $email;
        $user->level = $usersRights;
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
        return redirect('admin/users/list')->with('thongbao','Đã Updated User thành công');

    }
    public function getdelete($id){
        $user =  User::find($id);
         foreach($user->comments as $comment){
             $comment->delete();
         }
       // Comment::where('idUser','=',$id)->delete();    //giong cai tren
        $user->delete(); 
        return redirect('admin/users/list')->with('thongbao','Đã Delete User thành công');

    }

    //login
    public function getLoginAdmin(){
        return view('admin.login');
    }
    public function postLoginAdmin(Request $request){
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
             'level'=> 1,
        ];
        
        if (Auth::attempt($credentials)) {
            // The user is active, not suspended, and exists.
            return redirect('admin/tintuc/list')->with('thongbao','Đăng nhập thành công');
         }else{
           return redirect()->back()->withErrors(['Đăng nhập thất bại !']);
        }
        
    }

    //logout
    public function getLogoutAdmin($id){
        Auth::logout();
        return redirect('admin/login');
    }
}
