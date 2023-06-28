<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use APP\Follow;

class FollowsController extends Controller
{
        //フォローリスト
    public function followList(){
        return view('follows.followList');
    }
    // フォロワーリスト
    public function followerList(){
        return view('follows.followerList');
    }
public function show(User $user){
    $login_user= auth()->user();
    $is_following=$login_user->isFollowing($user->id);
    $is_followed=$login_user->isFollowed($user->id);
    $follow_count=$login_user->getFollowCount($user->id);
    $follower_count=$login_user->getFollowerCount($user->id);

    return view('users.show',[
        'user'=>$user,
        'is_following'=>$is_following,
        'is_followed'=>$is_followed,
        'follow_count'=>$follow_count,
        'follower_count'=>$follower_count
    ]);
}

}
