<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    
    public function index()
    {
        return view('frotend.users.profile');
    }


    public function update(Request $request)
    {
       
        $user = User::findOrfail(Auth::user()->id);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->userDetail()->updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['phone' => $request->phone, 'pincode' => $request->code, 'address' => $request->address]
        );
         
        return redirect()->back()->with('message','User Profile Update');

    }
}
