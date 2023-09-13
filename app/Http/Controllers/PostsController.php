<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\post;
use App\User;

class PostsController extends Controller
{
//Auth認証
public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        // ログイン認証しているユーザーをuserテーブルから情報取得
        $user = Auth::user();
        // dd($user);
        $posts=Post::get();
        // Pluckで取り出し
        $following_id= auth()->user()->follows()->pluck('followed_id');
    
        //Postモデル（postsテーブル）からレコード情報を取得
        // Wherein で指定　orWhere でもしくは一致する場合
        $posts = Post::orderBy('created_at','desc')->with('user')->whereIn('user_id',$following_id)->orWhere('user_id','id')->get();
        // dd($posts);
        return view('posts.index',['user'=>$user,'posts'=>$posts]);
    }
// 投稿機能
       public function Create(Request $request)
    {
        $request->validate([
            'new-post' => 'required|unique:posts,post|max:150',
        ]);
        $post = $request->input('new-post');
        \DB::table('posts')->insert([
            'post' => $post,
            'user_id'=> auth()->user()->id
        ]);
        return redirect('/top');
    } 

// 更新機能
    public function update(Request $request){
        $id=$request->input('id');
        $up_post=$request->input('upPost');
        Post::where('id',$id)->update(['post'=>$up_post]);
        return redirect('/top');
    }
// 削除機能
    public function delete($id)
    {
        Post::where('id',$id)->delete();
        return redirect('/top');
    }
    }