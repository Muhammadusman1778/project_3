<?php

namespace DiscussionForum\Http\Controllers;

use DiscussionForum\Discussion;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (request('filter')){

            case 'me':
                $results=Discussion::where('user_id',Auth::id())->paginate(3);
                break;

            case 'solved':
                $answered=array();
                foreach (Discussion::all() as $discussion):

                   if($discussion->has_best_answer()){

                       array_push($answered,$discussion);

                   }


                    endforeach;

                    $results=new Paginator($answered,3);

                break;

            case 'unsolved':
                $unanswered=array();
                foreach (Discussion::all() as $discussion):

                    if(!$discussion->has_best_answer()){

                        array_push($unanswered,$discussion);

                    }


                endforeach;

                $results=new Paginator($unanswered,3);

                break;
            default:

                $results=Discussion::orderBy('created_at','desc')->paginate(3);

                break;

        }
        return view('forum')->with('discussions',$results);
    }
}
