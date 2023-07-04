<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function ViewUser()
  {
     $data['allData'] = User::all();
     return view('backend.view.view_user', $data);
  }// End Method


  public function AddUser()
  {
    return view('backend.view.add_user');
  }// End Method


  public function StoreUser(Request $request)
  {
     $validatedDate = $request->validate([
        'email' => 'required | unique:users',
        'name' => 'required',
        'password' =>'required',
        'userType' => 'required'

     ]);

     $data = new User();
     $data->email = $request->email;
     $data->userType = $request->userType;
     $data->name = $request->name;
     $data->password = bcrypt($request->password);
     $data->save();

     return redirect()->route('view.user');
  }// End Method
}
