<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php if(isset($title)){echo $title;} ?></title>
<link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico?x=<?php echo time(); ?>" />
</head>
<body>
	<div class="row">
		<div class="alert alert-danger">
			This function not available in demo, go  <a href="<?php echo base_url().'admin/dashboard';?>">back</a> to admin panel or <a href="<?php echo base_url().'admin/dashboard/logout'?>">logout</a>
		</div>
	</div>
	<style type="text/css">
	.alert{
		text-align: center;
		margin-top: 10px;
		margin-left: 50px;
		margin-right: 20px;
	}
	</style>
</body>
</html>