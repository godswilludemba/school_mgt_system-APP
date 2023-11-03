<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function ViewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.designation_view',$data);

    }//End Method

    public function AddDesignation()
    {
        return view('backend.setup.designation.add_designation');
    }//End Method

    public function StoreDesignation(Request $request)
    {
         $validateData =$request->validate([
         'name'=>'required|unique:designations,name',
         ]);
         //$designation = newDesignation();
         $designation = new Designation();
         $designation->name = $request->name;
         $designation->save();

$notification = array(
    'message' => 'Designation Name inserted Successfully',
    'alert-type' => 'success'
);  
return redirect()->route('designation.view')->with($notification);
    }//End Method
}
