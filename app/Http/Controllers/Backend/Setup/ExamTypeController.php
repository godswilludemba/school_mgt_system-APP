<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ViewExamType()
    {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_Type.view_exam_type',$data);
    }// end method

    public function AddExamType()
    {
        return view('backend.setup.exam_Type.add_exam_type');

    }// end method

    public function StoreExamType(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required |unique:exam_types,name,'
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Exam Type inserted Successfully',
            'alert-type' => 'success'
        );  
        return redirect()->route('exam.type.view')->with($notification);

    }// end method

    public function EditExamType($id)
    {
        $editData = ExamType::find($id);
        return view('backend.setup.exam_Type.edit_exam_Type',compact('editData'));

    }// End Method

    public function ExamTypeUpdate(Request $request,$id)
    {
        $data = ExamType::find($id);
        $validatedData = $request->validate([
            'name'=>'required |unique:exam_types,name,'.$data->id,
        ]);

        
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Exam Type updated Successfully',
            'alert-type' => 'success'
        );  
        return redirect()->route('exam.type.view')->with($notification);

    }//End Method

    public function DeleteExamType($id)
    {
       $data = ExamType::find($id);
       $data->delete();

       $notification = array(
        'message' => 'Exam Type Deleted Successfully',
        'alert-type' => 'info'
    );
       return redirect()->route('exam.type.view')->with($notification);
    }//End Method
}
