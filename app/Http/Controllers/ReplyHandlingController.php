<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ReplyHandlingController extends Controller
{
    public function reply($id){

      //  dd(request()->content);

        Reply::create([

            'content'=>request()->content,
            'discussion_id'=>$id,
            'user_id'=>auth()->user()->id,

        ]);

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
