<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function StudentGroupView()
    {
        $data['allData'] = StudentGroup::all();
      return view('backend.setup.student_group.student_group_view',$data);

    }//End Method

    public function AddStudentGroup()
    {
        return view('backend.setup.student_group.add_student_group');
    }//End Method


    public function StoreStudentGroup(Request $request)
{

    $validatedData = $request->validate([
        'name' => 'required |unique:student_groups,name',
        ]);
        
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Student Group inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.group.view')->with($notification);
}// End Method


public function EditStudentGroup($id)
{
$editData = StudentGroup::find($id);
return view('backend.setup.student_group.edit_group',compact('editData'));
}//End Method


public function StudentGroupUpdate(Request $request,$id)
{

    $data = StudentGroup::find($id);
    $validatedData = $request->validate([
        'name' => 'required |unique:student_groups,name,'.$data->id,
        ]);
        
      
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Student Group Updated Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.group.view')->with($notification);
}//End Method

public function DeleteStudentGroup($id)
{
$user = StudentGroup::find($id);
$user->delete();

$notification = array(
    'message' => 'Student Group Deleted Successfully',
    'alert-type' => 'info'
);

return redirect()->route('student.group.view')->with($notification);
}// End Method




}
