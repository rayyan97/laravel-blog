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
        My profile
    </div>
 
  <div class="card-body">

    
  <form action="{{route('users.update-profile')}}" method="post" enctype="multipart/form-data">
    @csrf
        @method('PUT')
  
    <div class="form-group">
        <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" >
        
      </div>
      <div class="form-group">
       <label for="About">About</label>
    
      <textarea class="form-control" name="About" id="About" rows="5" cols="5">{{$user->about}}</textarea>
       </div>
     
   
          <button type="submit" class="btn btn-success btn-sm">Update</button>
   
   

   </form>

  </div>
</div>
    
@endsection



