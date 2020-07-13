@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            <img src="{{$discussion->user->avatar}}"  width="40px" height="40px" style="border-radius: 50px" alt="">
            <span>
                {{$discussion->user->name}}
            </span>
        </div>
        <div class="card-body">
         <h4 class="text-center">
             <b>{{$discussion->title}}</b>
         </h4>
            <p class="text-center">
                {{$discussion->content}}
            </p>
        </div>

        <div class="card-footer">
            <a href="{{route('discussions',$discussion->slug)}}">
                {{$discussion->channel->title}}
            </a>
        </div>

    </div>

    <div class="card card-default">

        <div class="card-body">

            @if(Auth::check())

                <form action="">

                    @csrf

                    <div class="form-group">
                        <label for="content">Leave a reply </label>
                        <textarea name="" id="content" cols="30" rows="10" class="form-control">

                        </textarea>
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-sm btn-primary float-right">
                            Leave a reply
                        </button>
                    </div>


                </form>




                @else

            <h2 class="text-center">
                Sign in to leave a reply .............
            </h2>


            @endif




        </div>


    </div>


    @endsection