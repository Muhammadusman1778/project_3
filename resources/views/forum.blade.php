@extends('layouts.app')

@section('content')

            @foreach($discussions as $discussion)
                <div class="card">
                    <div class="card-header">
                        <img src="{{$discussion->user->avatar}}" alt="" style="border-radius: 50px" width="40px" height="40px">
                        <span>{{$discussion->user->name}}<b>{{$discussion->created_at->diffForHumans()}}</b></span>
                        <a href="{{route('discussions',$discussion->slug)}}" class="btn btn-primary float-right btn-sm" style="margin-right:8px; ">view</a>
                    </div>

                    <div class="card-body">
                        <h4 class="text-center">
                            {{$discussion->title}}
                        </h4>
                        <p class="text-center">
                            {{Str::limit($discussion->content,50)}}
                        </p>

                    </div>
                    <div class="card-footer">

                    </div>
                </div>

        @endforeach

@endsection
