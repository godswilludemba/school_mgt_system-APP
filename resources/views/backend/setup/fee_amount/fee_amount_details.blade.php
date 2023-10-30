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
				  <h3 class="box-title">Fee Amount Details</h3>
          <a href="{{route('add.fee.amount')}}" style="float: right;" class="btn-rounded btn-info mb-5 px-3 py-2">Add Fee Amount</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
          <h4><strong>FEE Category : </strong> {{ $detailsData['0']['fee_category']['name']}}</h4>
					<div class="table-responsive">
					  <table  class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr>
								<th width="5%">S/N</th>							
								<th>Name</th>
								<th width="25%">Amount</th>
							
							</tr>
						</thead>
						<tbody>
              @foreach($detailsData as $key => $detail)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$detail['student_class']['name']}}</td>
								<td>{{$detail->amount}}</td>					
						
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