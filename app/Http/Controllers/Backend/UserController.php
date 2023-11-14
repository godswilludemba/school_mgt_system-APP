<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function ViewUser()
  {
     $data['allData'] = User::where('userType', 'Admin')->get();
     return view('backend.user.view_user', $data);
  }// End Method


  public function AddUser()
  {
    return view('backend.user.add_user');
  }// End Method


  public function StoreUser(Request $request)
  {
     $validatedDate = $request->validate([
        'email' => 'required | unique:users',
        'name' => 'required',
      //   'password' =>'required',
      //   'userType' => 'required'

     ]);

     $data = new User();
     $code = rand(0000, 9999);
     $data->role = $request->role;
     $data->userType = 'Admin';
     $data->name = $request->name;
     $data->email = $request->email;
     $data->password = bcrypt($code);
     $data->code = $code;
     $data->save();
     

    $notification = array(
        'message' => 'User Inserted Successfully',
        'alert-type' => 'success'

    );
     return redirect()->route('view.user')->with($notification);
  }// End Method


  public function EditUser($id)
  {
     $editData = User::find($id);
     return view('backend.user.edit_user', compact('editData'));
  }//End Method


   public function UpdateUser(Request $request, $id)
   {
    $data =  User::find($id);
    $data->email = $request->email;
    $data->role = $request->role;
    $data->name = $request->name;  
    $data->save();
    

   $notification = array(
       'message' => 'User Updated Successfully',
       'alert-type' => 'info'
   );
    return redirect()->route('view.user')->with($notification);
   }//End Method


   public function DeleteUser($id)
   {
     $user = User::find($id);
     $user->delete();

     $notification = array(
        'message' => 'User Deleted Successfully',
        'alert-type' => 'success'
    );
     return redirect()->route('view.user')->with($notification);
   }//End Method
}
