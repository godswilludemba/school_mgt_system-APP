<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubj()
    {
         //  for use to join the table by group, we comment out our first logic that enabled us visualized the id below.
       $data['allData'] = AssignSubject::all(); 
       //then write our join table by group logic

      //$data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();

      return view('backend.setup.assign_subject.view_assign_subject',$data);

    }// end Method
    
}
