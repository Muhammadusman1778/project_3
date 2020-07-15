@extends('layouts.app')

@section('content')



    <div class="card card-default">
        <div class="card-header">Update a Discussion</div>

        <div class="card-body">

            <form action="{{route('discussion.update',$discussion->id)}}" method="post">
                @csrf

                <div class="form-group">
                    <lablel for="content">Ask a question</lablel>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$discussion->content}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success float-right">
                        Save discussion changes
                    </button>

                </div>
            </form>


        </div>

    </div>
@endsection


