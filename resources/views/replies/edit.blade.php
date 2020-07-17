@extends('layouts.app')

@section('content')



    <div class="card card-default">
        <div class="card-header">Update a reply</div>

        <div class="card-body">

            <form action="{{route('reply.update',$reply->id)}}" method="post">
                @csrf

                <div class="form-group">
                    <lablel for="content">Ask a question</lablel>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$reply->content}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success float-right">
                        Save reply changes
                    </button>

                </div>
            </form>


        </div>

    </div>
@endsection


