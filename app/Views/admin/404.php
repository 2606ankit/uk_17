<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?= SITE_TITLE ?> | 404 Error Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin error -->
		<div class="error">
			<div class="error-code">404</div>
			<div class="error-content">
				<div class="error-message">We couldn't find it...</div>
				<div class="error-desc mb-3 mb-sm-4 mb-md-5">
					The page you're looking for doesn't exist. <br />
					Perhaps, there pages will help find what you're looking for.
				</div>
				<div>
					<a href="index.html" class="btn btn-success p-l-20 p-r-20">Go Home</a>
				</div>
			</div>
		</div>
		<!-- end error -->
 
        
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url(); ?>assets/js/app.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/theme/default.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>