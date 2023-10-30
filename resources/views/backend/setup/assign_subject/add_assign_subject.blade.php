@extends('admin.admin_master')
@section('index')
<script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous">
</script>

<div class="content-wrapper">
	  <div class="container-full">
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Assign Subject</h4>
			  	</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					<form method="POST" action="{{route('store.assign.subject')}}">
            @csrf
					  <div class="row">
						<div class="col-12">
							<div class="add_item">

            <div class="form-group">
								<h5>Student Class <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="class_id" required="" class="form-control">
                  
										<option value="" selected="" disabled="">Select Class</option>
                    @foreach($classes as $class)
										<option value="{{$class->id}}">{{$class->name }}</option>
									@endforeach
									</select>
              </div>
							</div>
							<!-- End of form group -->

							<div class="row">
							<div class="col-md-4">
							<div class="form-group">
								<h5>Student Assign Subject <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subject_id[]" required="" class="form-control">                
										<option value="" selected="" disabled="">Select Assign Subject </option>
                    @foreach($subjects as $subject)
										<option value="{{$subject->id}}">{{$subject->name }}</option>
									@endforeach
									</select>
              </div>
							</div> <!-- End form-group -->
							</div> <!-- End of col-md-4 -->
			
							<div class="col-md-2">
							<div class="form-group">
								<h5>Full Mark<span class="text-danger">*</span></h5>
								<div class="controls">
									<!-- because we want to have the ability of multi-selections we make it multi by adding an empty array first -->
									<input  type="text"  name="full_mark[]" class="form-control">
                  @error('full_mark')
                 <span class="text-danger"> {{$message}}</span>
                  @enderror
                 </div>				
							</div>	<!-- End form-group -->
							</div> <!-- End of col-md-2 -->

              <div class="col-md-2">
							<div class="form-group">
								<h5>Pass Mark<span class="text-danger">*</span></h5>
								<div class="controls">
									<!-- because we want to have the ability of multi-selections we make it multi by adding an empty array first -->
									<input  type="text"  name="pass_mark[]" class="form-control">
                  @error('pass_mark')
                 <span class="text-danger"> {{$message}}</span>
                  @enderror
                 </div>				
							</div>	<!-- End form-group -->
							</div> <!-- End of col-md-2 -->

              <div class="col-md-2">
							<div class="form-group">
								<h5>Subjective Mark<span class="text-danger">*</span></h5>
								<div class="controls">
									<!-- because we want to have the ability of multi-selections we make it multi by adding an empty array first -->
									<input  type="text"  name="subjective_mark[]" class="form-control">
                  @error('subjective_mark')
                 <span class="text-danger"> {{$message}}</span>
                  @enderror
                 </div>				
							</div>	<!-- End form-group -->
							</div> <!-- End of col-md-2 -->
				
							<div class="col-md-2" style="padding: 25px;">
							<span class="btn btn-success AddEventMore"><i class="fa fa-plus-circle"></i></span>
							</div> 	<!-- End of col-md-2 -->
							</div> <!-- End of row -->

         </div>
            <!-- end col -->
				</div> 		<!--  end of add_item -->
					
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

			<!-- AddMore sections -->
			<div  style="visibility: hidden;">
			<div class="whole_extra_item_add" id="whole_extra_item_add">
				<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
					<div class="form-row">

					<div class="col-md-4">
							<div class="form-group">
								<h5>Student Assign Subject <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subject_id[]" required="" class="form-control">                
										<option value="" selected="" disabled="">Select Assign Subject </option>
                    @foreach($subjects as $subject)
										<option value="{{$subject->id}}">{{$subject->name }}</option>
									@endforeach
									</select>
              </div>
							</div> <!-- End form-group -->
							</div> <!-- End of col-md-4 -->
			
							<div class="col-md-2">
							<div class="form-group">
								<h5>Full Mark<span class="text-danger">*</span></h5>
								<div class="controls">
									<!-- because we want to have the ability of multi-selections we make it multi by adding an empty array first -->
									<input  type="text"  name="full_mark[]" class="form-control">
                  @error('full_mark')
                 <span class="text-danger"> {{$message}}</span>
                  @enderror
                 </div>				
							</div>	<!-- End form-group -->
							</div> <!-- End of col-md-2 -->

              <div class="col-md-2">
							<div class="form-group">
								<h5>Pass Mark<span class="text-danger">*</span></h5>
								<div class="controls">
									<!-- because we want to have the ability of multi-selections we make it multi by adding an empty array first -->
									<input  type="text"  name="pass_mark[]" class="form-control">
                  @error('pass_mark')
                 <span class="text-danger"> {{$message}}</span>
                 @enderror
                 </div>				
							</div>	<!-- End form-group -->
							</div> <!-- End of col-md-2 -->

              <div class="col-md-2">
							<div class="form-group">
								<h5>Subjective Mark<span class="text-danger">*</span></h5>
								<div class="controls">
									<!-- because we want to have the ability of multi-selections we make it multi by adding an empty array first -->
									<input  type="text"  name="subjective_mark[]" class="form-control">
                  @error('subjective_mark')
                 <span class="text-danger"> {{$message}}</span>
                  @enderror
                 </div>				
							</div>	<!-- End form-group -->
							</div> <!-- End of col-md-2 -->
			
							
				
							<div class="col-md-2" style="padding: 25px;">
							<span class="btn btn-success AddEventMore"><i class="fa fa-plus-circle"></i></span>
							<span class="btn btn-danger RemoveEventMore"><i class="fa fa-minus-circle"></i></span>
							</div> 	<!-- End of col-md-2 -->

					</div>

				</div>

			</div>
			</div>

			<!-- JS Section for the addMore  events -->
			<script type="text/javascript">
				$(document).ready(function(){
					var counter = 0;
					$(document).on("click",".AddEventMore",function(){
						var whole_extra_item_add = $('#whole_extra_item_add').html();
						$(this).closest(".add_item").append(whole_extra_item_add); 
						counter++;
					});

					$(document).on("click",'.RemoveEventMore',function(event){
						$(this).closest(".delete_whole_extra_item_add").remove();
						counter -= 1;
					});
				});

			</script>
@endsection