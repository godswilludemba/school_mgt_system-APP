<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend//images/favicon.ico')}}">

    <title>Asuma Shool Management - Dashboard</title>
   
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  
    
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

@include('admin.body.admin_header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.body.admin_sideBar')

  <!-- Content Wrapper. Contains page content -->
@yield('index')
  <!-- /.content-wrapper -->

 @include('admin.body.admin_footer')

  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div>
  
</div> -->
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src=" {{asset('backend/js/vendors.min.js')}}"></script>
    <script src=" {{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src=" {{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src=" {{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src=" {{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

  <script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
	<script src="{{asset('backend/js/pages/data-table.js')}}"></script>
	
	<!-- Sunny Admin App -->
	<script src=" {{asset('backend/js/template.js')}}"></script>
	<script src=" {{asset('backend/js/pages/dashboard.js')}}"></script>

  <!-- SWEET ALERT -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
           <script type="text/javascript">
              $(function(){
                 $(document).on('click','#delete', function(e){
                    e.preventDefault();
                         var link = $(this).attr("href");

                                Swal.fire({
                                  title: 'Are you sure?',
                                   text: "You want to delete this!",
                                  icon: 'warning',
                                  showCancelButton: true,
                                  confirmButtonColor: '#3085d6',
                                  cancelButtonColor: '#d33',
                                  confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                  if (result.isConfirmed) {
                                    window.location.href = link
                                    Swal.fire(
                                      'Deleted!',
                                      'Your file has been deleted.',
                                      'success'
                                    )
                                  }
                                  })
                                  })
                                })

                    </script>
//end of sweet alert


	
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (Session::has('message'))
<script>
toastr.options = {

"progressBar":true,
"closeButton":true,
}

var type = "{{ Session::get('alert-type','info') }}"
switch(type){
  case 'info':
  toastr.info(" {{ Session::get('message') }} ");
  break;

  case 'success':
  toastr.success(" {{ Session::get('message') }} ");
  break;

  case 'warning':
  toastr.warning(" {{ Session::get('message') }} ");
  break;

  case 'error':
  toastr.error(" {{ Session::get('message') }} ");
  break; 
}

</script>
@endif 

	
</body>
</html>
