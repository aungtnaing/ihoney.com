<!doctype html>
<html>
<head>
	@include('dashboard.includes.head')
</head>
<body>
	
	<div class="wrapper">
	
		
		@include('dashboard.includes.sidebar')
		
		<div class="main">
			@include('dashboard.includes.header')
			@yield('content')
			@include('dashboard.includes.footer')
		</div>
		
	</div>


</body>



<script src="<?php echo url(); ?>/assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="<?php echo url(); ?>/assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo url(); ?>/assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo url(); ?>/assets/js/plugins/jquery-easypiechart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo url(); ?>/assets/js/plugins/chartist/chartist.min.js"></script>
	<script src="<?php echo url(); ?>/assets/js/klorofil.min.js"></script>

</html>
