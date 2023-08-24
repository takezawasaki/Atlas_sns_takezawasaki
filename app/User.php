<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','post','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // usersテーブルの同一テーブル内多対多リレーション
    //    belongstomanyに関係する相手のモデル：第１引数　第２引数：中間するテーブル名　第3引数：自分のカラム　第４引数：相手のカラム
    //
    // フォロー数
    public function follows(){
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');

    }
    // フォロワー数
    public function followers(){
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');

    }
// フォローする
    public function follow($user_id){
    return $this->follows()->attach($user_id);
}
// フォロー解除
public function unfollow($user_id){
    return $this->follows()->detach($user_id);
}

    // フォローしている数
    // first()の返り値はModelのオブジェクト
    // booleanで判定
    public function isFollowing(Int $user_id){
        return(boolean)$this->follows()->where('followed_id',$user_id)->first(['follows.id']);
    }
    // フォローされてる数
    public function isFollowed(Int $user_id){
        return(boolean)$this->followers()->where('following_id',$user_id)->first(['follows.id']);
    }

    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
    public function posts(){
        return $this->hasMany('App\Post');
    }
}



