<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function StudentClassView()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    } // End Method 


    public function AddStudentClass()
    {
      return view('backend.setup.student_class.add_student_class');
    }// End Method

public function StoreStudentClass(Request $request)
{
$validatedData = $request->validate([
'name' => 'required |unique:student_classes,name',
]);

$data = new StudentClass();
$data->name = $request->name;
$data->save();

$notification = array(
    'message' => 'Student class inserted Successfully',
    'alert-type' => 'success'
);

return redirect()->route('student.class.view')->with($notification);

}//End Method


public function EditStudentClass($id)
{
$editData = StudentClass::find($id);
return view('backend.setup.student_class.edit_class',compact('editData'));
}//End Method


public function StudentClassUpdate(Request $request,$id)
{

    $data = StudentClass::find($id);
    $validatedData = $request->validate([
        'name' => 'required |unique:student_classes,name,'.$data->id,
        ]);
        
      
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Student class Updated Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.class.view')->with($notification);
}//End Method


public function DeleteStudentClass($id)
{
$user = StudentClass::find($id);
$user->delete();

$notification = array(
    'message' => 'Student class Deleted Successfully',
    'alert-type' => 'info'
);

return redirect()->route('student.class.view')->with($notification);
}// End Method











}
