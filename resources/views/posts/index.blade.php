@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end my-3">
    <a href="{{ route('post.create') }}" class="btn btn-success btn-sm ">Add Post</a>
    </div>
    <div class="card ">
        
    <div class="card-header">
        {{-- {{$posts->trashed() ?'Trashed Posts':'Posts'}} --}}
       
    </div>
      <div class="card-body">
       
        @if ($posts->count() > 0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th></th>
                <th></th>
               
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                        <img src="/storage/{{$post->image}}" alt="" width="120px" height="60px">
                        </td>
                        <td>
                            {{ $post->title}}
                        </td>

                        @if ($post->trashed())
                        <td>
                            <form action="{{route('post.restore',$post->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info btn-sm">Restore</button>
                            </form>
                        </td>
                        @else
                        <td>
                        <a name="" id="" class="btn btn-info btn-sm" href="{{route('post.edit',$post->id)}}" role="button">Edit</a>
                        </td>
                        @endif
                        
                        <td>
                            
                        <form action="{{route('post.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">{{$post->trashed() ?'Delete':'Trash'}}</button>

                            </form>
                            
                        </td>
                   
                   
                    </tr>
                @endforeach
               
            </tbody>
        </table>
        @else
        <h3 class="text-center">No Post Available</h3>
        @endif
      
       
      </div>
    </div>

@endsection

@section('modal')

<!-- Button trigger modal -->


<!-- Modal -->
{{-- <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                <form action="{{route('category.destroy',$category->id)}}" method="post">
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
</script> --}}
    
@endsection