<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\Login;
use App\User;
use App\Post;
use APP\Follow;

class FollowsController extends Controller
{
        //フォローリスト
    public function followList(){
        $follows= auth()->user()->follows()->get();
        // ログインユーザーが誰をフォローしているのか
        $following_id= auth()->user()->follows()->pluck('followed_id');
        // user_id',following_idで投稿ユーザーが同じものから昇順で表示
        $posts=Post::with('user')->whereIn('user_id',$following_id)->latest()->get();
        return view('follows.followList',['follows'=>$follows,'post'=>$posts]);
        dd($posts);
    }
    // フォロワーリスト
    public function followerList(){
        return view('follows.followerList');
    }
// public function show(User $user){
//     $login_user= auth()->user();
//     $is_following=$login_user->isFollowing($user->id);
//     $is_followed=$login_user->isFollowed($user->id);
//     $follow_count=$login_user->getFollowCount($user->id);
//     $follower_count=$login_user->getFollowerCount($user->id);

//     return view('users.show',[
//         'user'=>$user,
//         'is_following'=>$is_following,
//         'is_followed'=>$is_followed,
//         'follow_count'=>$follow_count,
//         'follower_count'=>$follower_count
//     ]); 

    public function follow(User $user)
       {
        $follower=auth()->user();
        $is_following=$follower->isFollowing($user->id);
        if(!$is_following){
            $follower->follow($user->id);
            return back();
        }

    }

    public function unfollow(User $user)
    {
     $follower=auth()->user();
        $is_following=$follower->isFollowing($user->id);
        if($is_following){
            $follower->unfollow($user->id);
            return back();
        }
}
}

