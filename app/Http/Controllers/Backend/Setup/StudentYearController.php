<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function StudentYearView()
    {
        $data['allData'] = StudentYear::all();
      return view('backend.setup.student_year.student_year_view',$data);
    }// End Method

    public function AddStudentYear()
    {
        return view('backend.setup.student_year.add_student_year');
    }//End Method

public function StoreStudentYear(Request $request)
{

    $validatedData = $request->validate([
        'name' => 'required |unique:student_years,name',
        ]);
        
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Student Year inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.year.view')->with($notification);
}// End Method


public function EditStudentYear($id)
{
$editData = StudentYear::find($id);
return view('backend.setup.student_year.edit_year',compact('editData'));
}//End Method


public function StudentYearUpdate(Request $request,$id)
{

    $data = StudentYear::find($id);
    $validatedData = $request->validate([
        'name' => 'required |unique:student_years,name,'.$data->id,
        ]);
        
      
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Student Year Updated Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('student.year.view')->with($notification);
}//End Method


public function DeleteStudentYear($id)
{
$user = StudentYear::find($id);
$user->delete();

$notification = array(
    'message' => 'Student Year Deleted Successfully',
    'alert-type' => 'info'
);

return redirect()->route('student.year.view')->with($notification);
}// End Method




}
