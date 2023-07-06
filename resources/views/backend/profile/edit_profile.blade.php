@extends('admin.admin_master')
@section('index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="content-wrapper">
	  <div class="container-full">
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit/Manage Profile</h4>
			  	</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					<form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
            @csrf
					  <div class="row">
						<div class="col-12">


            <div class="row">

            <div class="col-md-6">
              <div class="form-group">
								<h5>User-Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" value="{{$editData->name}}" required=""> </div>				
							</div>
              </div>
              <!-- end of col -->

              <div class="col-md-6">
              <div class="form-group">
								<h5>Gender <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="gender" id="select" required="" class="form-control">
										<option value="" selected="" disabled="">Select Gender</option>
										<option value="Male" {{($editData->gender == "Male"? "selected": "")}}>Male</option>
										<option value="Female" {{($editData->gender == "Female"? "selected" : "")}}>Female</option>
										
									</select>
              </div>
							</div>

              </div>
           <!-- end of col -->
           
            </div>
            <!-- end col -->

            <div class="row">

            <div class="col-md-6">
              <div class="form-group">
								<h5>Address <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="address" class="form-control" value="{{$editData->address}}" required=""></div>				
							</div>
              </div>

           <!-- end of col -->
              <div class="col-md-6">
              <div class="form-group">
								<h5>Mobile No <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="mobile" class="form-control" value="{{$editData->mobile}}" required=""> </div>				
							</div>
              </div>
              <!-- end of col -->
            </div>
            <!-- end col -->

            

            <div class="row">
    
              <div class="col-md-6">
              <div class="form-group">
								<h5>User-Email <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" value="{{$editData->email}}" required=""></div>				
							</div>
              </div>

              <div class="col-md-6">
             <div class="form-group">
               <h5>Profile_Image <span class="text-danger">*</span></h5>
               <div class="controls">
                 <input type="file" name="image" class="form-control" value="{{$editData->image}}" required="" id="image"></div>				
             </div>

             <div class="form-group">              
               <div class="controls">
                <img id="showImage" src="{{(!empty($user->image)) ? url('upload/user_images/'.$user->image) : 
                url('upload/no_image.jpg')}}" alt="" style="width:100px; height:100px; border: 1px solid #000;">
                 </div>				
             </div>
             </div>
          

              </div>
              <!-- end of col -->

           
					
					  </div>

						<div class="text-xs-right">
						<input type="submit" class="btn btn-info mb-5 ml-3"  value="Update"></input>
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

      <script type="text/javascript">

$(document).ready(function(){
  $('#image').change(function(e){
       var reader = new FileReader();
            reader.onload = function(e){
                 $('#showImage').attr('src', e.target.result);
            }
                      reader.readAsDataURL(e.target.files['0']);
      });
  });



      </script>
@endsection