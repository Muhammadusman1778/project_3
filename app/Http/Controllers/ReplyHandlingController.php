<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Notifications\NewReplyAdded;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReplyHandlingController extends Controller
{
    public function reply($id){

      //  dd(request()->content);

        $d=Discussion::find($id);

        //dd($watchers);

       Reply::create([

            'content'=>request()->content,
            'discussion_id'=>$id,
            'user_id'=>auth()->user()->id,

        ]);
        $watchers=array();
        foreach ($d->watchers as $watcher):
            array_push($watchers,User::find($watcher->user_id));
        endforeach;


        Notification::send($watchers,new NewReplyAdded($d));

        session()->flash('success','Replied to discussion');
        return redirect()->back();

    }
    public function best_answer($id){

       // dd($id);
        $reply=Reply::find($id);
        $reply->best_answer=1;
        $reply->save();


        session()->flash('success','Reply has been marked as the best answer');

        return redirect()->back();


    }
}
