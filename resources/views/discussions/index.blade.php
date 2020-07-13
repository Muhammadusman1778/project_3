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
            <hr>

            @if($bestanswer)
                <div class="text-center">

                    <h3>BEST REPLY</h3>
                    <div class="card card-default">
                        <div class="card-header">
                            <img src="{{$bestanswer->user->avatar}}"  width="40px" height="40px" style="border-radius: 50px" alt="">
                            <span>
                         {{$bestanswer->user->name}}
                          </span>
                        </div>
                        <div class="card-body">
                            {!! $bestanswer->content !!}
                        </div>
                    </div>


                </div>


                @endif

        </div>

        <div class="card-footer">
            <span> {{$discussion->replies->count()}}Replies</span>
            <a href="{{route('discussions',$discussion->slug)}}">
                {{$discussion->channel->title}}
            </a>
        </div>

    </div>




   @foreach($discussion->replies as $reply)

       <div class="card card-default">
           <div class="card-header">
               <img src="{{$reply->user->avatar}}"  width="40px" height="40px" style="border-radius: 50px" alt="">
               <span>
                {{$reply->user->name}}
            </span>
               <a href="{{route('discussion.bestanswer',$reply->id)}}" class="btn btn-sm btn-info float-right" style="margin-left: 8px">
                   Mark as best answer
               </a>
           </div>
           <div class="card-body">

               <p class="text-center">
                   {{$reply->content}}
               </p>
           </div>

           <div class="card-footer">
               <a href="/" class="btn btn-danger btn-sm">Like</a>
               <a href="/" class="btn btn-primary btn-sm">Unlike</a>
           </div>

       </div>


       @endforeach


    <div class="card card-default">

        <div class="card-body">

            @if(Auth::check())

                <form action="{{route('discussion.reply',$discussion->id)}}" method="post">

                    @csrf

                    <div class="form-group">
                        <label for="content">Leave a reply </label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
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