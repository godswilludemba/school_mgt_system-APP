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
       //import the model for all the things we all about to join.
       $data['allData'] = FeeCategoryAmount::all();
      return view('backend.setup.fee_amount.fee_category_amount_view',$data);

    } // End Method

    public function AddFeeAmount()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
      return view('backend.setup.fee_amount.add_fee_amount', $data);
    }// End Method
   
}
