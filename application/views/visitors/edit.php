<?php //echo '<pre>'; print_r($visitor); echo '</pre>'; ?>
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
			
			if (isset($alert_success)) { 
			?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $alert_success; ?> <a href="<?php echo base_url('visitors') ?>">Return to Index.</a>
				</div>
			<?php
			}
			
			if (isset($alert_trash)) { 
			?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $alert_trash; ?> <a href="<?php echo base_url('visitors') ?>">Return to Index.</a>
				</div>
			<?php
			}
			
				//begin form
				$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'main_form');
				echo form_open('visitors/edit/'.$id, $attributes); 
			?>
					<div class="form-group">
                        <label class="control-label col-sm-2" for="first_visit_year">Year of First Visit<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_visit_year" value="<?php echo set_value('first_visit_year', $visitor['first_visit_year']); ?>" required />
                        </div>
					</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fname">First Name<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" value="<?php echo set_value('fname', $visitor['fname']); ?>" required />
                        </div>
					</div>
					<div class="form-group">
                        <label class="control-label col-sm-2" for="mname">Middle Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="mname" value="<?php echo set_value('mname', $visitor['mname']); ?>" />
                        </div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="lname">Last Name<span class="text-info">*</span></label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="lname" value="<?php echo set_value('lname', $visitor['lname']); ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="bdate">Birthdate<span class="text-info">*</span></label>
						<div class="col-sm-10">
							<input type='text' class="form-control" name="bdate" id='datetimepicker1' value="<?php echo set_value('bdate', $visitor['bdate']); ?>" />
							<script type="text/javascript">
								$(function () {
									$('#datetimepicker1').datetimepicker({
										format: 'YYYY-MM-DD',
										viewMode: 'years'
									});
								});
							</script>
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="gender">Gender<span class="text-info">*</span></label>
						<div class="col-sm-10">
							<select class="form-control select2-single" name="gender">
								<option value="">Select</option>
								<option value="M" <?php if (set_value('gender', $visitor['gender']) == 'M') echo 'selected' ?> >Male</option>
								<option value="F" <?php if (set_value('gender', $visitor['gender']) == 'F') echo 'selected' ?> >Female</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="civil_status">Civil Status</label>
						<div class="col-sm-10">
							<select class="form-control select2-single" name="civil_status">
								<option value="">Select</option>
								<option value="S" <?php if (set_value('civil_status', $visitor['civil_status']) == 'S') echo 'selected' ?> >Single</option>
								<option value="M" <?php if (set_value('civil_status', $visitor['civil_status']) == 'M') echo 'selected' ?> >Married</option>
                                <option value="W" <?php if (set_value('civil_status', $visitor['civil_status']) == 'W') echo 'selected' ?> >Widowed</option>
                                <option value="O" <?php if (set_value('civil_status', $visitor['civil_status']) == 'O') echo 'selected' ?> >Other</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nationality">Nationality<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nationality" value="<?php echo set_value('nationality', $visitor['nationality']); ?>" />
                        </div>
					</div>
                    
                    <div class="form-group">
                        <div class="col-sm-12"><hr /></div>
                    </div>
                    
                    <div class="form-group">
						<label class="control-label col-sm-2" for="h_address">Home Address<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="h_address" value="<?php echo set_value('h_address', $visitor['h_address']); ?>" />
						</div>
					</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="occupation">Occupation<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="occupation" value="<?php echo set_value('occupation', $visitor['occupation']); ?>" />
                        </div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="h_address">Biz Address<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="b_address" value="<?php echo set_value('b_address', $visitor['b_address']); ?>" />
						</div>
					</div>
                    
                    <div class="form-group">
                        <div class="col-sm-12"><hr /></div>
                    </div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="mobile_no">Mobile No.</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="mobile_no" value="<?php echo set_value('mobile_no', $visitor['mobile_no']); ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email<span class="text-info">*</span></label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" value="<?php echo set_value('email', $visitor['email']); ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="b_contact_no">Biz Phone</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="b_contact_no" value="<?php echo set_value('b_contact_no', $visitor['b_contact_no']); ?>" />
						</div>
					</div>

                    <div class="form-group">
                        <div class="col-sm-12"><hr /></div>
                    </div>
                    
                    <div class="form-group">
					<label class="control-label col-sm-2" for="diver">Diver</label>
					<div class="col-sm-4">
                        <select class="form-control select2-single" name="diver">
							<option value="">Select</option>
                            <option value="1" <?php if (set_value('diver', $visitor['diver']) == '1') echo 'selected' ?> >Yes</option>
							<option value="0" <?php if (set_value('diver', $visitor['diver']) == '0') echo 'selected' ?> >No</option>
						</select>
					</div>
                    <label class="control-label col-sm-2" for="swimmer">Swimmer</label>
					<div class="col-sm-4">
                        <select class="form-control select2-single" name="swimmer">
							<option value="">Select</option>
                            <option value="1" <?php if (set_value('swimmer', $visitor['swimmer']) == '1') echo 'selected' ?> >Yes</option>
							<option value="0" <?php if (set_value('swimmer', $visitor['swimmer']) == '0') echo 'selected' ?> >No</option>
						</select>
					</div>
				    </div>

                    <div class="form-group">
                        <div class="col-sm-12"><hr /></div>
                        <label class="control-label col-sm-2">Emergency Contact</label>
                    </div>

                    <div class="form-group">
					<label class="control-label col-sm-2" for="ice_fullname">Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ice_fullname" value="<?php echo set_value('ice_fullname', $visitor['ice_fullname']); ?>" />
					</div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ice_contact_nos">Contact Nos.<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ice_contact_nos" value="<?php echo set_value('ice_contact_nos', $visitor['ice_contact_nos']); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ice_address">Address<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ice_address" value="<?php echo set_value('ice_address', $visitor['ice_address']); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ice_relationship">Relationship<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ice_relationship" value="<?php echo set_value('ice_relationship', $visitor['ice_relationship']); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12"><hr /></div>
                    </div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="status_code">Status Code<span class="text-info">*</span></label>
						<div class="col-sm-10">
							<select class="form-control select2-single" name="status_code">
								<option value="">Select</option>
								<option value="0" <?php if (set_value('status_code', $visitor['status_code']) == '0') echo 'selected' ?> >Undefined</option>
								<option value="1" <?php if (set_value('status_code', $visitor['status_code']) == '1') echo 'selected' ?> >Welcome</option>
								<option value="2" <?php if (set_value('status_code', $visitor['status_code']) == '2') echo 'selected' ?> >Conditional Entry</option>
                                <option value="3" <?php if (set_value('status_code', $visitor['status_code']) == '3') echo 'selected' ?> >Total Ban</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="remarks">Remarks</label>
						<div class="col-sm-10">
							<textarea name="remarks" class="form-control" rows="5"><?php echo set_value('remarks', $visitor['remarks']); ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="delete">Delete</label>
						<div class="col-sm-10">
							<input type="checkbox" id="trash" name="trash" value="1" <?php if (set_value('trash', $visitor['trash']) == '1') echo 'checked' ?> />
						</div>
					</div>		
                    <?php
                    //for encoders only, input reason for change 
                    if ($this->ion_auth->in_group('encoder')) {
                    ?>
                    <div class="form-group">
                        <div class="col-sm-12"><hr /></div>
                        <div class="col-sm-12"><hr /></div>
                    </div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="remarks">Reason for edit</label>
						<div class="col-sm-10">
							<textarea name="mod_reason" class="form-control" rows="5"><?php echo set_value('mod_reason'); ?></textarea>
						</div>
					</div>
                    <?php
                    }
                    ?>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<!-- audit trail temp values -->
							<input type="hidden" id="altered" name="altered" value="" />
                            <!-- audit trail temp values -->
                            <input type="hidden" id="mod_fields" name="mod_fields" value="" />
							<input type="hidden" name="action" value="1" />
							<input type="hidden" name="visitor_id" value="<?php echo $visitor['visitor_id'] ?>" />
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
					<!--
					<div class="form-group">
						<?php //echo '<pre>'; print_r($visitor); echo '</pre>'; ?>
					</div>		
					-->
					
				</form>
		</div>
	</div>
</div>
<script>
$(function () {
	
	$("form").submit(function(e){
		
		var x = '';
        var y = '';
		
		//step through each input elements
		$('#main_form *').filter(':input').each(function() {
		    var f = $(this).attr('name'); 
			var g = $(this).prop('defaultValue'); 
			var h = $(this).val();
			
			
			if (g != null && g != '0000-00-00') {
				if (g != h) {
					x += 'field: ' + f + ', old value: ' + g + ', new value: ' + h + ' | ';
                    y += f + ',';

					console.log(f + '::' + g + '::' + h + '| ');
		    	}
			}
			
		});
		
		$("#altered").val(x); //details for audit tracking
        $("#mod_fields").val(y); //modified fields
		//console.log(x);
		
    });

	$('#trash').on('change', function () {
		$.confirm({
			title: 'Confirm Delete',
			content: 'Are you sure?',
			buttons: {
				confirm: function () {
					//nothing
				},
				cancel: function () {
					$('#trash').prop('checked', true); // Checks it
					$('#trash').prop('checked', false); // Unchecks it
				}
			}

		});
	});

});		
</script>