<?php 
//echo '<pre>'; print_r($_POST); echo '</pre>'; 
//echo '<pre>'; echo $ben_id; echo '</pre>'; 
?>
<div class="container">
<h2><?php echo $title; ?></h2>
<p><a href="javascript:history.go(-1)" ><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a></p>
<div class="panel panel-default">
	<div class="panel-body">
		<p class="small"><span class="text-info">*</span> Indicates a required field</p>
		<?php 
		echo '<div class="text-warning">';
		echo validation_errors();
		echo '</div>'; 

		if (isset($alert_success)) 
		{ 
		?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $alert_success ?> <a href="<?php echo base_url('services') ?>">Return to Index.</a>
			</div>
		<?php
		}
	

		if ( $this->input->POST('action') === NULL) {
			//begin match find form
			$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'form-match-find');
			echo form_open('visits/add', $attributes); 
		?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fname">First Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fname" id="fname" value="<?php echo set_value('fname'); ?>" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fname">Middle Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mname" id="mname" value="<?php echo set_value('mname'); ?>" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lname">Last Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lname" id="lname" value="<?php echo set_value('lname'); ?>" required />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="bdate">Birthdate<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type='text' class="form-control" name="bdate" id='datetimepicker1' value="<?php echo set_value('bdate'); ?>" required />
						<script type="text/javascript">
							$(function () {
								var end = new Date();
								//end.setFullYear(end.getFullYear() - 12);

								$('#datetimepicker1').datetimepicker({
									format: 'YYYY-MM-DD',
									viewMode: 'years',
									maxDate: end
								});
							});
						</script>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" id="match_submit">Submit</button>
					</div>
				</div>
			</form>
			<!-- end: match find form -->
		<?php
			}
		?>
		<!-- display the remainder of the form only if no match is found -->
		<div class="match-found alert alert-warning collapse" id="match-found"></div> 

	</div>
</div>
</div>

<script type="text/javascript">
//move this to data.js

// Ajax post
$(document).ready(function() {

	$("#match_submit").click(function(event) {
		
		event.preventDefault();
		
		$("#match_submit").hide();
		$("#match-found").show();

		//set the previously entered values to read-only
		$("input#fname").prop("readonly", true);
		$("input#mname").prop("readonly", true);
		$("input#lname").prop("readonly", true);
		$("input#datetimepicker1").prop("readonly", true);

		$.ajax({
			"type" : "POST",
			"url" : "<?php echo base_url('visitors/match_find'); ?>",
			"data" : $("#form-match-find").serialize(), // serializes the form's elements.
			"success" : function(data) {
				console.log(data);
				$("#match-found").html(data);
			},
			"error" : function(jqXHR, status, error) {
				console.log("status:", status, "error:", error);
				$("#match-find").text(status);
			}
		});
	});

	$("#optradio").click(function(event) {
		alert('x');
	});

});
</script>