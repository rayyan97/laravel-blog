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
 
  <div class="card-body">

    
  <form action="{{isset($post)?route('post.update',$post->id):route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    @if (isset($post))
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value="{{isset($post)?$post->title:''}}" >
        
      </div>
      <div class="form-group">
       <label for="description">Description</label>
    
      <textarea class="form-control" name="description" id="description" rows="5" cols="5">{{isset($post)?$post->description:''}}</textarea>
       </div>
       <div class="form-group">
           <label for="mycontent">Content</label>
       <input id="mycontent" type="hidden" name="mycontent" value="{{isset($post)?$post->content:''}}">
            <trix-editor input="mycontent"></trix-editor>
           
           </div>
           <div class="form-group">
             <label for="published_at">Published At</label>
             <input type="text" name="published_at" id="published_at" class="form-control" value="{{isset($post)?$post->published_at:''}}">
            
           </div>

      
            <div class="form-group">
              <label for="categories">Category</label>
              <select class="form-control" name="categories" id="categories">
                @foreach ($categories as $category)
              <option value="{{$category->id}}"
                
               @if (isset($post))
                  @if ($post->category_id == $category->id)
                    selected
                  @endif
               @endif
                
                
                >
                {{$category->name}}</option>
                @endforeach
               
               
              </select>
            </div>
          
            @if ($tags->count() > 0)

            <div class="form-group">
              <label for="tags">Tags</label>
              <select class="form-control tag-selector" name="tags[]" id="tags" multiple>
              
                @foreach ($tags as $tag)

                <option value="{{$tag->id}}"
                  
                  @if (isset($post))

                  @if ($post->hasTag($tag->id))

                  selected
                      
                  @endif
                      
                  @endif
                  
                  
                  >
  
                  {{$tag->name}}
                
                </option>
  
                @endforeach
                
             
               
              
              </select>
            </div>
            @endif

           @if (isset($post))
           <div class="form-group">
           <img src="/storage/{{$post->image}}" width="100%">
          </div>
           @endif
           
           <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
           
          </div>
   
          <button type="submit" class="btn btn-success btn-sm">{{isset($post)?'Update Post':'Add Post'}}</button>
   
   

   </form>

  </div>
</div>
    
@endsection

@section('scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}



<script>
//   $(document).ready(function() {
//     $('.tag-selector').select2();
//     console.log('jquesy');
// });

  flatpickr('#published_at',{
    enableTime: true,
    enableSeconds: true,
  })
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}


    
@endsection