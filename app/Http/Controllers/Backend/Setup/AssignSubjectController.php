<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubj()
    {
         //  for us to join the table by group, we comment out our first logic that enabled us visualized the id below.
       //$data['allData'] = AssignSubject::all(); 
       //then write our join table by group logic

      $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();

      return view('backend.setup.assign_subject.view_assign_subject',$data);

    }// end Method

    public function AssignSubjAdd()
    {
      $data['subjects'] = SchoolSubject::all();
      $data['classes'] = StudentClass::all();
    return view('backend.setup.assign_subject.add_assign_subject', $data);

    }//end method

    public function StoreAssignSubj(Request $request)
    {
      $subjectClass = count($request->subject_id);
      if( $subjectClass != NULL){
        for($i = 0; $i < $subjectClass; $i++){
          $assign_subject = new AssignSubject();
          $assign_subject->class_id = $request->class_id;
          $assign_subject->subject_id = $request->subject_id[$i];
          $assign_subject->full_mark = $request->full_mark[$i];
          $assign_subject->pass_mark = $request->pass_mark[$i];
          $assign_subject->subjective_mark = $request->subjective_mark[$i];
          $assign_subject->save();

        }//end of for loop
      }// end of if method
      $notification = array(
        'message' => 'Subjects Assigned Successfully',
        'alert-type' => 'success'
    );
       return redirect()->route('assign.subject.view')->with($notification);

    }// end method

    public function EditAssignSubj($class_id)
    {
      $data['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','ASC')->get();
      // dd($data['editData']->toArray());
      $data['subjects'] = SchoolSubject::all();
      $data['classes'] = StudentClass::all();
    return view('backend.setup.assign_subject.edit_assign_subject', $data);

    }// end method

    public function UpdateAssignSubj(Request $request, $class_id)
    {
      if($request->subject_id == NULL){
       
        $notification = array(
          'message' => 'Sorry, no Subject was Selected',
          'alert-type' => 'error'
      );
         return redirect()->route('assign.subject.edit',$class_id)->with($notification);

      }else{

        $subjectClass = count($request->subject_id);
        AssignSubject::where('class_id',$class_id)->delete();
        for($i = 0; $i < $subjectClass; $i++){
          $assign_subject = new AssignSubject();
          $assign_subject->class_id = $request->class_id;
          $assign_subject->subject_id = $request->subject_id[$i];
          $assign_subject->full_mark = $request->full_mark[$i];
          $assign_subject->pass_mark = $request->pass_mark[$i];
          $assign_subject->subjective_mark = $request->subjective_mark[$i];
          $assign_subject->save();

        }//end of for loop
      };// end else if condition

      $notification = array(
        'message' => 'Data Updated Successfully',
        'alert-type' => 'success'
    );
       return redirect()->route('assign.subject.view')->with($notification);
    }//end Method

    public function AssignSubjDetails($class_id)
    {
      $data['detailsData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','ASC')->get();
      return view('backend.setup.assign_subject.assign_subject_details',$data);
    }//End Method
    
}
