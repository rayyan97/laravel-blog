<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\user_req\UpdateUser;

class UserConroller extends Controller
{
    public function index(){
        return view('user.index')->with('users',User::all());
    }

    public function makeAdmin(User $user){
        $user->role = 'admin';
        $user->save();
        session()->flash('success','Role Changed Successfully !');
        return redirect('users');
    }

    public function destroy($id)
    {
       
        $user = User::find($id);
        
            $user->delete();

            session()->flash('success','user Deleted Successfully');
            return redirect('users');
      
       
    }

    public function edit(){
        return view('user.create')->with('user',auth()->user());

    }

    public function update(UpdateUser $request){

        $user = auth()->user();
        $user->update([
            'name'=> $request->name,
            'about'=>$request->About
        ]);

        $user->save();
        session()->flash('success','User Updated Successfully');
        return redirect(route('users'));

    }
}
