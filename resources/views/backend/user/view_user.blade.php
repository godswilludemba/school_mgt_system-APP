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
				  <h3 class="box-title">User List</h3>
          <a href="{{route('add.user')}}" style="float: right;" class="btn btn-info mb-5">ADD USER</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="5%">S/N</th>
								<th>Role</th>
								<th>Name</th>
								<th>Email</th>
								<th width="20%">Action</th>
							
							</tr>
						</thead>
						<tbody>
              @foreach($allData as $key => $user)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$user->userType}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
                  <a href="{{route('edit.user', $user->id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('delete.user', $user->id)}}" class="btn btn-danger" id="delete">Delete</a>
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