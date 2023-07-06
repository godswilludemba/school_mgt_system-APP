@extends('admin.admin_master')
@section('index')

<div class="content-wrapper">
	  <div class="container-full">
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">CHANGE PASSWORD</h4>
			  	</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					<form method="POST" action="{{route('update.password')}}">
            @csrf
					  <div class="row">
						<div class="col-12">

           
              <div class="form-group">
								<h5>Old-Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="password" id="current_password" name="oldPassword" class="form-control">
                  @error('oldPassword')
                 <span class="text-danger"> {{$message}}</span>
                  @enderror
                 </div>				
							</div>
              
           <!-- end of col -->
              <div class="form-group">
								<h5>New-Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="password" id="password" name="password" class="form-control" >
                  @error('password')
                 <span class="text-danger"> {{$message}}</span>
                  @enderror
                </div>				
							</div>
           
              <!-- end of col -->
              <div class="form-group">
								<h5>Confirm-Password <span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="password" id="password_confirmation" name="password_confirmation" class="form-control" >
                  @error('password_confirmation')
                 <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>				
							</div>
           
              <!-- end of col -->
            </div>
            <!-- end col -->
					
					  </div>

						<div class="text-xs-right">
						<input type="submit" class="btn btn-info mb-5 ml-3"  value="Submit"></input>
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