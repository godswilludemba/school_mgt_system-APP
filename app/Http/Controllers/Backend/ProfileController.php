<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   public function ViewProfile()
   {

    //use the id to find the authenticated user
    $id = Auth::user()->id;

  // using the user model, find the id of the auth user and compact in to the page
  $user = User::find($id);

  return view('backend.profile.view_profile', compact('user'));
   }// End Method


   public function EditProfile()
   {
    $id = Auth::user()->id;
    $editData = User::find($id);
    return view('backend.profile.edit_profile', compact('editData'));
   }//End Method

   public function ProfileUpdate(Request $request)
   {
//insert in to the DB following the unique id
     $data = User::find(Auth::user()->id);
     $data->name = $request->name;
     $data->gender = $request->gender;
     $data->address = $request->address;
     $data->mobile = $request->mobile;
     $data->email = $request->email;

     //image intervention
     if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            $data['image'] = $fileName;
     };
     $data->save();

     $notification = array(
        'message' => 'Profile Updated Successfully',
        'alert-type' => 'success'
    );
     return redirect()->route('view.profile')->with($notification);
   }// End Method


public function ChangePassword()
{
return view('backend.profile.change_password');
}// End Method

public function UpdatePassword(Request $request)
{
$validatePassword = $request->validate([
    'oldPassword' => 'required',
    'password' => 'required|confirmed',
   
   
]);
$hashPwd = Auth::user()->password;
if(Hash::check($request->oldPassword,$hashPwd)){
    $user = User::find(Auth::id());
    $user->password = Hash::make($request->password);
    $user->save();
    Auth::logout();

    $notification = array(
        'message' => 'Password Changed Successfully, PLZ Login',
        'alert-type' => 'success'
    );

    return redirect()->route('login')->with($notification);

}else{

    $notification = array(
        'message' => 'Oops Password Changed unsuccessful',
        'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);
}

}// End Method














}
