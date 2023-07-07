<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.Fees.fee_category_view',$data);
    }// end method

    public function AddFeeCategory()
    {
        return view('backend.setup.Fees.add_fee_category');

    }//End Method

    public function StoreFeeCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required |unique:fee_categories,name,'
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Fee Category inserted Successfully',
            'alert-type' => 'success'
        );  
        return redirect()->route('fee.category.view')->with($notification);
    }//End Method

    public function EditFeeCategory($id)
    {
        $editData = FeeCategory::find($id);
        return view('backend.setup.Fees.edit_fee_category',compact('editData'));

    }// End Method

    public function FeeCategoryUpdate(Request $request,$id)
    {
        $data = FeeCategory::find($id);
        $validatedData = $request->validate([
            'name'=>'required |unique:fee_categories,name,'.$data->id,
        ]);

        
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
            'message' => 'Fee Category updated Successfully',
            'alert-type' => 'success'
        );  
        return redirect()->route('fee.category.view')->with($notification);

    }//End Method

    public function DeleteFeeCategory($id)
    {
       $data = FeeCategory::find($id);
       $data->delete();

       $notification = array(
        'message' => 'Fee Category Deleted Successfully',
        'alert-type' => 'info'
    );
       return redirect()->route('fee.category.view')->with($notification);
    }//End Method






















}
