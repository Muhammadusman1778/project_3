<?php

namespace DiscussionForum\Http\Controllers;

use DiscussionForum\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatcherHandlingController extends Controller
{
    public function watch($id){

        $replyid=$id;
        $user_id=Auth::id();

        Watcher::create([
            'user_id'=>$user_id,
            'discussion_id'=>$replyid
        ]);

        session()->flash('success','You watch the discussion');

        return redirect()->back();



    }
    public function unwatch($id){

        $watcher=Watcher::where('user_id',Auth::id())->where('discussion_id',$id);

        $watcher->delete();

        session()->flash('success','You unwatch the discussion');

        return redirect()->back();



    }
}
