<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
//Auth認証
public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        // ログイン認証しているユーザーの情報取得
        $user = Auth::user();
        // 現在認証しているユーザーの情報を取得
        $username = Auth::user()->username;
        return view('posts.index');
    }
}
