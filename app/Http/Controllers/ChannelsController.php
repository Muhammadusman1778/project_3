<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\CreateChannelsRequest;
use App\Http\Requests\UpdateChannelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('channels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateChannelsRequest $request)
    {
        Channel::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title)
        ]);

        session()->flash('success', 'Channel Created.');

        return redirect(route('channels.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('channels.create')->with('channel',$channel);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelsRequest $request, Channel $channel)
    {
      //  dd($request->title);
        $channel->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title)
        ]);

        session()->flash('success', 'Channel Updated.');

        return redirect(route('channels.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();

        session()->flash('success', 'Channel Deleted.');

        return redirect(route('channels.index'));
    }
}
