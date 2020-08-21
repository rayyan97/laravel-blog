@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end my-3">
    <a href="{{route('tag.create')}}" class="btn btn-success btn-sm ">Add tag</a>
    </div>
    <div class="card ">
        
    <div class="card-header">
        Tags
       
    </div>
      <div class="card-body">
      
       @if ($tags->count() > 0)
            
        <table class="table">
            <thead>
                <th>Names</th>
                <th>Post Count</th>
                <th> </th>
                <th> </th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->name }}
                        </td>
                        <td>
                            {{$tag->posts->count()}}                    
                        </td>
                    <td><a href="{{route('tag.edit',$tag->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                    <td>
                        {{-- <form action="{{route('tag.destroy',$tag->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form> --}}

                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modelId">
                            Delete
                          </button>
                        </td>
                   
                    </tr>
                @endforeach
               
            </tbody>
        </table>

        @section('modal')

        <!-- Button trigger modal -->
        
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">Alert</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                           Are you sure you want to delete ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No,Close</button>
                        <form action="{{route('tag.destroy',$tag->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Yes,Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
                
            });
        </script>
            
        @endsection




        @else
        <h3 class="text-center">No tag Available</h3>
       @endif
  

      </div>
    </div>

@endsection

