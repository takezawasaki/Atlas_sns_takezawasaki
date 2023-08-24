<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

// 検索機能
    public function search(Request $request){
        $users=User::paginate(20);
        $keyword=$request->input('keyword');
        // dump($keyword);
        $query=User::query();
        // データベース内
        if(!empty($keyword)){
            $query->where('username','like','%'.$keyword.'%')->get();
            // dump($users);
            $users=$query->paginate(20);
    }
        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }
}

