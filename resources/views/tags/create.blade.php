@extends('layouts.app')

@section('content')

    @if ($errors->any())

    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            
            <li class="list-group-item text-danger">
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
       
        
    @endif
    <div class="card mt-5">
        <div class="card-header">
        {{isset($tags)?"Update tags":"Create tags"}}
        </div>
   <div class="card-body">
   <form action="{{ isset($tags)?route('tag.update',$tags->id):route('tag.store') }}" method="POST">
    @csrf
    @if (isset($tags))
        @method('PUT')
    @endif
        <div class="form-group">
        <input type="text" class="form-control" name="name" value="{{ isset($tags)? $tags->name : "" }}">
        </div>
         <button type="submit" class="btn btn-success btn-sm">  {{isset($tags)?"Update tags":"Add tags"}}</button>
    </form>
   </div>
  
</div>
@endsection