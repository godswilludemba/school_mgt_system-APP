@extends('admin.admin_master')
@section('index')

<div class="content-wrapper">
	  <div class="container-full">
		
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Student Year </h4>
			  	</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

					<form method="POST" action="{{route('update.student.year',$editData->id)}}">
            @csrf
					  <div class="row">
						<div class="col-12">

           
              <div class="form-group">
								<h5>Add Student Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<input  type="text"  name="name" class="form-control" value="{{$editData->name}}">
                  @error('name')
                 <span class="text-danger"> {{$message}}</span>
                  @enderror
                 </div>				
							</div>
         
              <!-- end of col -->
            </div>
            <!-- end col -->
					
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
@endsection