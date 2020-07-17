<?php

namespace DiscussionForum\Http\Controllers;

use DiscussionForum\Discussion;
use DiscussionForum\Notifications\NewReplyAdded;
use DiscussionForum\Reply;
use DiscussionForum\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReplyHandlingController extends Controller
{
    public function reply($id){

      //  dd(request()->content);

        $d=Discussion::find($id);

        //dd($watchers);

      $reply= Reply::create([

            'content'=>request()->content,
            'discussion_id'=>$id,
            'user_id'=>auth()->user()->id,

        ]);
      $anser= $reply->user->points +=25;
      // dd($anser);

       $reply->user->save();

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

        $reply->user->points +=50;


        $reply->user->save();


        session()->flash('success','Reply has been marked as the best answer');

        return redirect()->back();


    }

    public function edit($id){

        return view('replies.edit',['reply'=>Reply::where('id',$id)->first()]);

    }

    public function update($id){
        $this->validate(request(),[
            'content'=>'required'
        ]);
        $reply=Reply::find($id);
        // e dd($discussion->id);
        $reply->content=request()->content;
        $reply->save();
        session()->flash('success','Reply Updated');
        return redirect(route('discussions',$reply->discussion->slug));
    }
}
