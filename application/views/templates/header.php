<?php
//define viewing restrictions by user group
$restricted_groups = array('wwf','partner'); 
?>
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
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

		<!--JQuery Confirm -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

        <!-- chart.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

        <!-- printPreview.js -->
        <script src="<?php echo base_url('js/printPreview.js') ?>"></script>
  		
	</head>

	<body>
		<!-- fixed navbar at the top -->
		<!-- This bar collapses on a smaller screen, and can be toggled by the burger icon-->
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  	<div class="container-fluid">
				<div class="navbar-header">
			  		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
			  		</button>
                    <?php 
                    if (!$this->ion_auth->in_group($restricted_groups)) {  
                    ?>
			  		<a class="navbar-brand" href="<?php echo base_url('dashboard') ?>">
			  			<span class="glyphicon glyphicon-home"></span> <small>Donsol TIS</small>
			  		</a>
                    <?php
                    }
                    else{
                    ?>
                    <a class="navbar-brand" href="#">
                        <span class="glyphicon glyphicon-home"></span> <small>Donsol TIS</small> 
                    </a>
                    <?php    
                    }
                    ?>
				</div>
			<div class="collapse navbar-collapse" id="navBar">
			  	<ul class="nav navbar-nav">
				  	<!--
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-chart-bar"></i>&nbsp; Summaries<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('visits/daily') ?>"><i class="fas fa-folder-open"></i>&nbsp; Daily</a></li>
							<li><a href="<?php echo base_url('visits/weekly') ?>"><i class="fas fa-folder-open"></i>&nbsp; Weekly</a></li>
							<li><a href="<?php echo base_url('visits/monthly') ?>"><i class="fas fa-folder-open"></i>&nbsp; Monthly</a></li>
                            <li><a href="<?php echo base_url('visits/yearly') ?>"><i class="fas fa-folder-open"></i>&nbsp; Yearly</a></li>
						</ul>
					</li>
					-->
                    <?php
                    if (!$this->ion_auth->in_group($restricted_groups)) {  
                    ?>
					<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-address-book"></i>&nbsp; Visitors<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('visitors') ?>"><i class="fas fa-folder-open"></i>&nbsp; Main Registry</a></li>
                            <li><a href="<?php echo base_url('visitors/partner_entries') ?>"><i class="fas fa-folder-open"></i>&nbsp; Partner Entries</a></li>
                        </ul>
                    </li>
					<li><a href="<?php echo base_url('visits') ?>"><i class="fas fa-camera"></i>&nbsp; Visits</a></li>
                    <li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-ship"></i>&nbsp; Activities<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('activities/butanding') ?>"><i class="fas fa-folder-open"></i>&nbsp; Butanding Interaction</a></li>
							<li><a href="<?php echo base_url('activities/girawan') ?>"><i class="fas fa-folder-open"></i>&nbsp; Girawan Tour</a></li>
							<li><a href="<?php echo base_url('activities/firefly') ?>"><i class="fas fa-folder-open"></i>&nbsp; Firefly Watching</a></li>
                            <li><a href="<?php echo base_url('activities/islandhop') ?>"><i class="fas fa-folder-open"></i>&nbsp; Island Hopping</a></li>
						</ul>
					</li>
                    <?php 
                    }
                    if ($this->ion_auth->in_group('admin'))
					{
					?>
                        <li><a href="<?php echo base_url('photoid') ?>"><i class="fas fa-camera"></i>&nbsp; PhotoID</a></li>
						<li><a href="<?php echo base_url('users') ?>"><i class="fas fa-users"></i>&nbsp; Users</a></li>
                        <!--<li><a href="<?php echo base_url('users') ?>"><span class="glyphicon glyphicon-eye-open"></span> Audit Trail</a></li>-->
					<?php
					}
					?>
			  	</ul>
			  	<ul class="nav navbar-nav navbar-right">
                        <!-- <li><a href="<?php echo base_url('users') ?>"><span class="glyphicon glyphicon-cog"></span> Settings</a></li> -->
						<li><a href="<?php echo base_url('logout') ?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
						<!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
			  	</ul>
			</div>
		  </div>
		</nav>
		<!-- navbar -->
		<!-- modals -->
		<div id="not_available" class="modal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Alert</h4>
			</div>
			<div class="modal-body">
				<p>This module is not yet available.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>

		</div>
		</div>