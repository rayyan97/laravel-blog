@extends('layouts.app')

@section('content')

  
    <div class="card ">
        
    <div class="card-header">
      Users
       
    </div>
      <div class="card-body">
      
       @if ($users->count() > 0)
            
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Names</th>
                <th>Email </th>
               
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                    <td><img src="{{ Gravatar::src($user->email) }}"></td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{$user->email}}                    
                        </td>
                        @if (!$user->isAdmin())
                        <td>
                            
                            <form action="{{route('make-admin',$user->id)}}" method="post">
                                @csrf

                                <button type="submit"class="btn btn-success btn-sm">Make Admin</a>
                            </form>
                        </td> 
                        @endif
                    
               
                   
                    </tr>
                @endforeach
               
            </tbody>
        </table>

        




        @else
        <h3 class="text-center">No tag Available</h3>
       @endif
  

      </div>
    </div>

@endsection

