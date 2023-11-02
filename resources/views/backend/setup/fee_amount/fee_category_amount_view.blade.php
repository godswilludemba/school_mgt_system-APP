@extends('admin.admin_master')
@section('index')

<div class="content-wrapper">
	  <div class="container-full">
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">	
		
			<div class="col-12">
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Fee Category Amount List</h3>
          <a href="{{route('add.fee.amount')}}" style="float: right;" class="btn-rounded btn-info mb-5 px-3 py-2">Add Fee Amount</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">S/N</th>							
								<th>Fee Category</th>
								<th width="25%">Action</th>
							
							</tr>
						</thead>
						<tbody>
              @foreach($allData as $key => $amount)
							<tr>
								<td>{{$key+1}}</td>
								
								<td>{{$amount['fee_category']['name']}}</td>							
								<td>
                  <a href="{{route('edit.fee.amount',$amount->fee_category_id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('fee.amount.details',$amount->fee_category_id)}}" class="btn btn-primary" >Details</a>
                </td>
						
							</tr>
							@endforeach
						</tbody>
						<tfoot>
            
						</tfoot>
					  </table>
					</div>
				    </div>
			       </div>
			        	</div>
			              </div>       
		                  	</div>
		                        </div>
	                            	</section>
		             <!-- /.content -->
	        </div>
      </div>
@endsection