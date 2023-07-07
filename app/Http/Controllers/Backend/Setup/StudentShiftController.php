<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function StudentShiftView()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.student_shift.student_shift_view',$data);
    }// End Method

    public function AddStudentShift()
    {
       return view('backend.setup.student_shift.add_student_shift');
    }// End Method

    public function StoreStudentShift(Request $request)
    {
     $validatedData = $request->validate([
        'name' => 'required |unique:student_shifts,name',
     ]);

     $data = new StudentShift();
     $data->name = $request->name;
     $data->save();

     $notification = array(
        'message' => 'Student Shift inserted Successfully',
        'alert-type' => 'success'
    );  
    return redirect()->route('student.shift.view')->with($notification);
    }// End Method


    public function EditStudentShift($id)
    {
      $editData = StudentShift::find($id);
      return view('backend.setup.student_shift.edit_shift',compact('editData'));
    }// End Method

    public function StudentShiftUpdate(Request $request,$id)
    {
        $data = StudentShift::find($id);
        $validatedData = $request->validate([
            'name' => 'required |unique:student_shifts,name,'.$data->id,
         ]);
    
         
         $data->name = $request->name;
         $data->save();
    
         $notification = array(
            'message' => 'Student Shift updated Successfully',
            'alert-type' => 'success'
        );  
        return redirect()->route('student.shift.view')->with($notification);
    }// End Method


    public function DeleteStudentShift($id)
    {
        $data = StudentShift::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Student Shist Deleted Successfully',
            'alert-type' => 'info'
        );
        
        return redirect()->route('student.shift.view')->with($notification);

    }// End Method
  








}
