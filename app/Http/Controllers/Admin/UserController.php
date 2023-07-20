<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
   {
       $users =  User::paginate(10);

       return view('admin.users.index',compact('users'));
   }


   public function create()
   {
      return view('admin.users.create');
   }

   public function store(Request $request)
   {
        $request->validate([
                'name' => 'required',
                'password' => 'required',
                'role'  => 'required|string'
            ]);
      
           User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role'  => $request->role,
            'email' => $request->email
            ]);
        return redirect()->route('index')->with('message','user create sucessfully');
   }

   public function edit(int $user_id)
   {
       $user = User::where('id',$user_id)->first();

       return view('admin.users.edit', compact('user'));
   }

   public function update(Request $request,int $user_id)
   {
        $user = User::where('id',$user_id)->first();
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'role'  => 'required|string'
        ]);
        
        $user->updateOrInsert(
            ['id' => $user_id],
            ['name' => $request->name, 'password' => Hash::make($request->password),'role_as'  => $request->role,'email' => $request->email]
        );
       
        return redirect()->back()->with('message' ,'User Update Sucessfully');
   }

   public function delete(int $user_id)
   {
       $user = User::where('id',$user_id)->first();
      
       $user->delete();

       return redirect()->back()->with('message' ,'User Delete Sucessfully');
   }

   
}
