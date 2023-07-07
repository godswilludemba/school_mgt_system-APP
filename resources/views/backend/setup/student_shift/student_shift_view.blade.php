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
				  <h3 class="box-title">Student Shift List</h3>
          <a href="{{route('add.student.shift')}}" style="float: right;" class="btn-rounded btn-info mb-5 px-3 py-2">Add Student Shift Name</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">S/N</th>							
								<th>Name</th>
								<th width="20%">Action</th>
							
							</tr>
						</thead>
						<tbody>
              @foreach($allData as $key => $shift)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$shift->name}}</td>							
								<td>
                  <a href="{{route('edit.student.shift', $shift->id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('delete.student.shift', $shift->id)}}" class="btn btn-danger" id="delete">Delete</a>
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