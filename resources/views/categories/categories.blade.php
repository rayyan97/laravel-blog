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
        {{isset($category)?"Update Category":"Create Category"}}
        </div>
   <div class="card-body">
   <form action="{{ isset($category)?route('category.update',$category->id):route('category.store') }}" method="POST">
    @csrf
    @if (isset($category))
        @method('PUT')
    @endif
        <div class="form-group">
        <input type="text" class="form-control" name="name" value="{{ isset($category)? $category->name : "" }}">
        </div>
         <button type="submit" class="btn btn-success btn-sm">  {{isset($category)?"Update Category":"Add Category"}}</button>
    </form>
   </div>
  
</div>
@endsection