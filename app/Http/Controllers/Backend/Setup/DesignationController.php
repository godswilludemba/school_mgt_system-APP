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

    public function EditDesignation($id)
    {
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('editData'));

    }// End Method

    public function DesignationUpdate(Request $request,$id)
    {
        $data = Designation::find($id);
        $validatedData = $request->validate([
            'name'=>'required |unique:designations,name,'.$data->id,
        ]);

        
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Designation Name updated Successfully',
            'alert-type' => 'success'
        );  
        return redirect()->route('designation.view')->with($notification);

    }//End Method

    public function DeleteDesignation($id)
    {
       $data = Designation::find($id);
       $data->delete();

       $notification = array(
        'message' => 'Designation Deleted Successfully',
        'alert-type' => 'info'
    );
       return redirect()->route('designation.view')->with($notification);
    }//End Method


}
