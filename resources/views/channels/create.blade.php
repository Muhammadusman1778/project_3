@extends('layouts.app')
@section('content')

    <div class="card card-default">
        <div class="card-header">{{isset($channel)?'Edit Channel':'Create Channel'}}</div>

            <div class="card-body">

                <form action="{{isset($channel)? route('channels.update',$channel->id):route('channels.store')}}" method="post">
                    @csrf
                    @if(isset($channel))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="{{isset($channel)?$channel->title:''}}">
                    </div>

                    <div class="form-group">
                        <div class="text-center">

                            <button type="submit" class="btn btn-success">
                                {{isset($channel)?'Update Channel':'Save Channel'}}
                            </button>

                        </div>

                    </div>

                </form>


            </div>

    </div>




    @endsection