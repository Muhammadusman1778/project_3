<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesHandlingController extends Controller
{
    public function like($id){

        $replyid=$id;
        $user_id=Auth::id();

        Like::create([
            'user_id'=>$user_id,
            'reply_id'=>$replyid
        ]);

        session()->flash('success','You liked the reply');

        return redirect()->back();



    }
    public function unlike($id){

        $like=Like::where('user_id',Auth::id())->where('reply_id',$id);

        $like->delete();

        session()->flash('success','You unliked the reply');

        return redirect()->back();



    }
}
