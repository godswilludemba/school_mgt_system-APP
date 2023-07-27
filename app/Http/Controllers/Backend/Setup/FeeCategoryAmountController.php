<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;



class FeeCategoryAmountController extends Controller
{
    public function ViewFeeCategoryAmount()
    {
       //import the model for all the things we are about to join.
      //  for use to join the table by group, we comment out our first logic that enabled us visualized the id below.
      //  $data['allData'] = FeeCategoryAmount::all(); then write our join table by group logic

      $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();

      return view('backend.setup.fee_amount.fee_category_amount_view',$data);

    } // End Method

    public function AddFeeAmount()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
      return view('backend.setup.fee_amount.add_fee_amount', $data);
    }// End Method
   
    public function StoreFeeAmount(Request $request)
  
    {
      $countClass = count($request->class_id);
      if( $countClass != NULL){
        for($i = 0; $i < $countClass; $i++){
          $fee_amount = new FeeCategoryAmount();
          $fee_amount->fee_category_id = $request->fee_category_id;
          $fee_amount->class_id = $request->class_id[$i];
          $fee_amount->amount = $request->amount[$i];
          $fee_amount->save();

        }//end of forloop
      }// end of if method
      $notification = array(
        'message' => 'Fee Amount Inserted Successfully',
        'alert-type' => 'success'
    );
       return redirect()->route('fee.amount.view')->with($notification);
    } // nd Method
}
