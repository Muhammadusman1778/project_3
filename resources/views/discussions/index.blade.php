@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            <img src="{{$discussion->user->avatar}}"  width="40px" height="40px" style="border-radius: 50px" alt="">
            <span>
                {{$discussion->user->name}} <b>{{$discussion->user->points}}</b>
            </span>


            @if(Auth::id()==$discussion->user->id)

                @if(!$discussion->has_best_answer())
                    <a href="{{route('discussions.edit',$discussion->slug)}}" class="btn btn-sm btn-info float-right" style="margin-left: 8px">
                       <span> Edit</span>
                    </a>
                @endif


                @endif




           @if(Auth::check())
                @if($discussion->is_being_watch_by_auth_user())
                    <a href="{{route('discussion.unwatch',$discussion->id)}}" class="btn btn-danger btn-sm float-right" style="margin-left: 8px">
                        unwatch
                    </a>

                @else

                    <a href="{{route('discussion.watch',$discussion->id)}}" class="btn btn-primary btn-sm float-right" style="margin-left: 8px">
                        watch
                    </a>

                @endif



               @endif











        </div>
        <div class="card-body">
         <h4 class="text-center">
             <b>{{$discussion->title}}</b>
         </h4>
            <p class="text-center">
                {!! Markdown::convertToHtml($discussion->content) !!}
            </p>
            <hr>

            @if($bestanswer)
                <div class="text-center" style="padding: 40px">

                    <h3>BEST REPLY</h3>
                    <div class="card card-default">
                        <div class="card-header">
                            <img src="{{$bestanswer->user->avatar}}"  width="40px" height="40px" style="border-radius: 50px" alt="">
                            <span>
                         {{$bestanswer->user->name}} <b>{{$bestanswer->user->points}}</b>
                          </span>
                        </div>
                        <div class="card-body">
                            {!! Markdown::convertToHtml($bestanswer->content) !!}
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
                {{$reply->user->name}}<b>{{$reply->user->points}}</b>
            </span>
               @if(!$bestanswer)

                   @if(Auth::id()==$discussion->user->id)

                       <a href="{{route('discussion.bestanswer',$reply->id)}}" class="btn btn-sm btn-info float-right" style="margin-left: 8px">
                           Mark as best answer
                       </a>

                   @endif

                   @endif

               @if(Auth::id()==$reply->user->id)
                   @if(!$reply->bestanswer)

                       <a href="{{route('reply.edit',$reply->id)}}" class="btn btn-sm btn-info float-right">
                           Edit
                       </a>


                       @endif


                   @endif




           </div>
           <div class="card-body">

               <p class="text-center"> {!! Markdown::convertToHtml($reply->content) !!}</p>
           </div>

           <div class="card-footer">
               @if($reply->is_liked_by_auth_user())
               <a href="{{route('reply.unlike',$reply->id)}}" class="btn btn-danger btn-sm">
                   Unlike <span class="badge">{{$reply->likes->count()}}</span>
               </a>
                   @else

                   <a href="{{route('reply.like',$reply->id)}}" class="btn btn-primary btn-sm">
                       Like <span class="badge">{{$reply->likes->count()}}</span>
                   </a>

                   @endif
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