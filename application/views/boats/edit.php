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
                    <?php echo $alert_success; ?> <a href="<?php echo base_url('boats') ?>">Return to Index.</a>
            </div>
            <?php
            }
                
            if (isset($alert_trash)) { 
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $alert_trash; ?> <a href="<?php echo base_url('boats') ?>">Return to Index.</a>
            </div>
            <?php
            }
		
                $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'main_form');
				echo form_open('boats/edit/'.$id , $attributes); 
			?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ab_name">Boat Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="ab_name" value="<?php echo set_value('ab_name', $boat['ab_name']); ?>" />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="ab_operator">Operator Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="ab_operator" value="<?php echo set_value('ab_operator', $boat['ab_operator']); ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ab_acc_no">Accreditation No.<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="ab_acc_no" value="<?php echo set_value('ab_acc_no', $boat['ab_acc_no']); ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ab_acc_yr">Accreditation Year<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="ab_acc_yr" id="datetimepicker1" value="<?php echo set_value('ab_acc_yr', $boat['ab_acc_yr']); ?>" />
                        <script type="text/javascript">
							$(function () {
								$('#datetimepicker1').datetimepicker({
									format: 'YYYY',
									viewMode: 'years'
								});
							});
						</script>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="ab_acc_expiry">Accreditation Expiry<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="ab_acc_expiry" id="datetimepicker2" value="<?php echo set_value('ab_acc_expiry', $boat['ab_acc_expiry']); ?>" />
                        <script type="text/javascript">
							$(function () {
								$('#datetimepicker2').datetimepicker({
									format: 'YYYY',
									viewMode: 'years'
								});
							});
						</script>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="ab_status">Boat Status<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<select name="ab_status" class="form-control select2-single" >
							<option value="1" <?php $select = ($boat['ab_status'] == 1) ? TRUE : FALSE ; echo  set_select('ab_status', '1', $select ); ?> >Active</option>
                            <option value="2" <?php $select = ($boat['ab_status'] == 2) ? TRUE : FALSE ; echo  set_select('ab_status', '2', $select ); ?> >Suspended</option>
                            <option value="3" <?php $select = ($boat['ab_status'] == 3) ? TRUE : FALSE ; echo  set_select('ab_status', '3', $select ); ?> >Terminated</option>
                            <option value="0" <?php $select = ($boat['ab_status'] == 4) ? TRUE : FALSE ; echo  set_select('ab_status', '4', $select ); ?> >Undefined</option>
						</select>
					</div>	
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="ab_remarks">Remarks</label>
					<div class="col-sm-10">
						<textarea name="ab_remarks" class="form-control" rows="5"><?php echo set_value('ab_remarks', $boat['ab_remarks']); ?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="delete">Delete</label>
					<div class="col-sm-10">
						<input type="checkbox" id="trash" name="ab_trash" value="1" <?php if (set_value('ab_trash', $boat['ab_trash']) == '1') echo 'checked' ?> />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
$(function () {
	
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