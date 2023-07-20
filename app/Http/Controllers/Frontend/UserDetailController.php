<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function changePassword()
   {
        return view('frotend.users.change-password');
   }

   public function updatePassword(Request $request)
   {
       
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required','confirmed']
        ]);

        $currentPassword = Hash::check($request->current_password, Auth::user()->password);
       
        if($currentPassword){
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }

   }
}
