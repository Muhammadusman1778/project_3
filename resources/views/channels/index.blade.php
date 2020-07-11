@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header">
            Channels
        </div>
        <div class="card-body">
            <table class="table table-hover">
               <thead>
               <th>Name</th>
               <th>Edit</th>
               <th>Delete</th>
               </thead>

                    @foreach($channels as $channel)

                          <tr>
                              <td>{{$channel->title}}</td>
                              <td>
                                  <a href="{{route('channels.edit',$channel->id)}}" class="btn btn-info btn-sm">Edit</a>
                              </td>
                              <td>
                                  <button class="btn btn-danger btn-sm" onclick="handleDelete({{$channel->id}})">
                                      Delete
                                  </button>
                              </td>
                          </tr>

                    @endforeach


            </table>
            <form action="" method="post" id="deleteChannelForm">
                @method('DELETE')
                 @csrf
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Channel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No,GoBack</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    @endsection
@section('scripts')

    <script>
        function handleDelete(id) {
            var form=document.getElementById('deleteChannelForm');
            form.action='/channels/'+id;
            console.log('deleting'+form);
            $('#deleteModal').modal('show')
            
        }
    </script>
    
    @endsection