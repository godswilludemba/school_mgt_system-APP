@extends('admin.admin_master')
@section('index')

<div class="content-wrapper">
	  <div class="container-full">
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit User</h4>
			  	</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					<form method="POST" action="{{route('update.user',$editData->id)}}">
            @csrf
					  <div class="row">
						<div class="col-12">


            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
								<h5>User-Role <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="userType" id="select" required="" class="form-control">
										<option value="" selected="" disabled="">Select Role</option>
										<option value="Admin" {{($editData->userType == "Admin"? "selected": "")}}>ADMIN</option>
										<option value="User" {{($editData->userType == "User"? "selected" : "")}}>USER</option>
										
									</select>
              </div>
							</div>

              </div>
           <!-- end of col -->
              <div class="col-md-6">
              <div class="form-group">
								<h5>User-Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" value="{{$editData->name}}" required=""> </div>				
							</div>
              </div>
              <!-- end of col -->
            </div>
            <!-- end col -->

            


              <div class="col-md-12">
              <div class="form-group">
								<h5>User-Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" value="{{$editData->email}}" required=""></div>				
							</div>
              </div>
              <!-- end of col -->
           
					
					  </div>

						<div class="text-xs-right">
						<input type="submit" class="btn btn-secondary mb-5 ml-3"  value="Update"></input>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
	        </div>
      </div>
@endsection