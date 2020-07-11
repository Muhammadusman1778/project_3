@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header">Create Discussion</div>

        <div class="card-body">

            <form action="{{route('discussions.store')}}" method="post">
                @csrf


                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
               <div class="form-gorup">
                   <label for="channel_id">Channel</label>
                   <select name="channel_id" id="channel_id" class="form-control">
                       @foreach($channels as $channel)
                           <option value="{{$channel->id}}">{{$channel->title}}</option>
                       @endforeach
                   </select>
               </div>
                <div class="form-group">
                    <label for="content">Ask a question</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">

                        <button type="submit" class="btn btn-success float-right">
                           Create
                        </button>

                    </div>

                </div>

            </form>


        </div>

    </div>



@endsection