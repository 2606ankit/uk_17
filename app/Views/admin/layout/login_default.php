<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?= $data['site_title']; ?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">

	
        <?= $this->renderSection('content') ?>


 <!-- ================== BEGIN BASE JS ================== -->
 <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/theme/default.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>
	