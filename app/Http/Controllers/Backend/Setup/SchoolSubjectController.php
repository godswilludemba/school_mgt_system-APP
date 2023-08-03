<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function ViewSchSubj()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject',$data);

    }// end Method

    public function AddSchSubj()
    {
        return view('backend.setup.school_subject.add_school_subject');

    }// end method

    public function StoreSchSubj(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required |unique:school_subjects,name,'
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Subject Name inserted Successfully',
            'alert-type' => 'success'
        );  
        return redirect()->route('school.subject.view')->with($notification);

    }// end method

    public function EditSchSubj($id)
    {
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject',compact('editData'));

    }// End Method

    public function SchSubjUpdate(Request $request,$id)
    {
        $data = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name'=>'required |unique:school_subjects,name,'.$data->id,
        ]);

        
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Subject Name updated Successfully',
            'alert-type' => 'success'
        );  
        return redirect()->route('school.subject.view')->with($notification);

    }//End Method

    public function DeleteSchSubj($id)
    {
       $data = SchoolSubject::find($id);
       $data->delete();

       $notification = array(
        'message' => 'Subject Name Deleted Successfully',
        'alert-type' => 'info'
    );
       return redirect()->route('school.subject.view')->with($notification);
    }//End Method

}
