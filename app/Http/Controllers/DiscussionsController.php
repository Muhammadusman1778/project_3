<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
                'channel_id'=>'required'

            ]);
      $discussion=  Discussion::create([
            'title'=>$request->title,
            'channel_id'=>$request->channel_id,
            'content'=>$request->content,
          'slug'=>Str::slug($request->title)
        ]);

        session()->flash('success', 'Discussion Created.');

        return redirect(route('discussions',$discussion->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  str slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion=Discussion::where('slug',$slug)->first();
        $bestanswer=Reply::where('best_answer',1)->first();
        return view('discussions.index')
            ->with('discussion',$discussion)
            ->with('bestanswer',$bestanswer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function channel($slug){

        $channel=Channel::where('slug',$slug)->first();

        return view('channel')->with('discussions',$channel->discussions()->paginate(3));


    }


}
