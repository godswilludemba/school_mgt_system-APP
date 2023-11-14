@extends('admin.admin_master')
@section('index')

<div class="content-wrapper">
	  <div class="container-full">
		
		<!-- Main content -->
		<section class="content">
		  <div class="row">	
		
			<div class="col-12">

      <div class="box box-inverse bg-img" data-overlay="2">
					  <div class="flexbox px-20 pt-20">
						<label class="toggler toggler-danger text-white">
						  <input type="checkbox">
						  <i class="fa fa-heart"></i>
						</label>
            <a href="{{route('edit.profile')}}" class="btn btn-info mb-2" style="float:right">Edit Profile</a>
					  </div>

					  <div class="box-body text-center pb-50">
						<a href="#">
						  <img class="avatar avatar-xxl avatar-bordered" src="{{(!empty($user->image)) ? url('upload/user_images/'.$user->image) : 
                url('upload/no_image.jpg')}}" alt="">
						</a>
						<h4 class="mt-2 mb-0"><a class="hover-info text-white">User Name : {{$user->name}}</a></h4>
						<span><i class="fa fa-user w-20 " aria-hidden="true"></i> UserType : {{$user->userType}}</span><br>
						<span><i class="fa fa-user w-20 " aria-hidden="true"></i> User-Role : {{$user->role}}</span>
            <h6 ><i class="hover-secondary text-white">User e-mail : {{$user->email}}</i> </h6>
					  </div>

					  <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
						<li>
						  <h5 class="opacity-60">Mobile-No</h5>
						  <h6 class="font-size-15">{{$user->mobile}}</h6>
						</li>
						<li>
						  <h5 class="opacity-60">Address</h5>
						  <h6 class="font-size-15">{{$user->address}}</h6>
						</li>
						<li>
						  <h5 class="opacity-60">Gender</h5>
						  <h6 class="font-size-15">{{$user->gender}}</h6>
						</li>
					  </ul>
					</div>



			        	</div>
			              </div>       
		                  	 	</section>
		             <!-- /.content -->
	        </div>
      </div>

@endsection