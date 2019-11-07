<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
class commentController extends Controller
{
    public function getdelete($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('thongbao','Xóa comment thành công');
    }
    //Post comment
    public function postComment(Request $request ,$idTinTuc){
        $validatedData = $request->validate([
            'msg' => ['required','min:4'],
                   
        ],
        [
            'msg.min'=> 'Comment cần có ít nhất 4 ký tự!',
            'msg.required' => 'Comment not null !'                     
        ]);

        if(Auth::check()){
        $comment = new Comment;
        $comment->idUser = Auth::user()->id;
        $comment->idTinTuc = $idTinTuc ;
        $comment->NoiDung = $request->msg;
        $comment->save();
        return redirect()->back();
        }else{
         return redirect('login');
        }
    }
}
