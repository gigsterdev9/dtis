<!DOCTYPE html>
<html lang="en">
<!-- Development: PJ Villarta // Powered by Apache, PHP, Code Igniter, Bootstrap, Jquery, X-editable -->
	<head>
    	<title>DTIS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- prod: online -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" />
		<!-- end: prod: online -->
		<!-- for offline dev work --
		<link rel="stylesheet" href="<?php echo base_url('styles/bootstrap.min.css') ?>" /> 
		<link rel="stylesheet" href="<?php echo base_url('styles/bootstrap-editable.css') ?>" />
		<!-- end: for offline dev work -->
		<link rel="stylesheet" href="<?php echo base_url('styles/chart.css') ?>" />
		<link rel="stylesheet" href="<?php echo base_url('styles/styles.css') ?>" />
		<!-- for bootstrap-datepicker -->
		<link rel="stylesheet" href="<?php echo base_url('styles/bootstrap-datetimepicker.min.css') ?>" />
		
		<!-- prod: online -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
		<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.4.4/d3.min.js"></script>
		<!-- prod: online -->
		<!-- for offline dev work --
		<script src="<?php echo base_url('js/jquery.min.js') ?>"></script>
		<script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('js/bootstrap-editable.min.js') ?>"></script>
		<script src="<?php echo base_url('js/run_prettify.js') ?>"></script>
		<script src="<?php echo base_url('js/d3.min.js') ?>"></script>
		<!-- end: for offline dev work -->
		
		<!-- for jchart -->
		<script src="<?php echo base_url('js/jchart.js') ?>"></script>
		<script src="<?php echo base_url('js/d3pie.min.js') ?>"></script>
		
		<!-- for bootstrap-datepicker -->
		<script src="<?php echo base_url('js/moment.min.js') ?>"></script>
		<script src="<?php echo base_url('js/collapse.js') ?>"></script>
		<script src="<?php echo base_url('js/transition.js') ?>"></script>
		<script src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>"></script>

		<!-- new additions -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		
		<link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!--JQuery Confirm -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

		<style type="text/css">
			body { 
    			padding-top: 65px; 
			}
			#footer-div{
				padding-bottom: 20px;
			}
			#logos img {
				height:100px;
			}
		</style>
	</head>
	<body>
	<div class="container">
