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
				Entry added. 
                <a href="<?php echo base_url('photoid') ?>">Return to Index.</a>
			</div>
		<?php
		}
	
			//begin form
			$attributes = array('class' => 'form-horizontal', 'role' => 'form');
			echo form_open('photoid/add', $attributes); 
		?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="report_date">Report Date<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type='text' class="form-control" name="report_date" id='datetimepicker1' value="<?php echo ($this->input->get('report_date') !== null) ? $this->input->get('report_date') : set_value('report_date'); ?>" required />
						<script type="text/javascript">
							$(function () {
								$('#datetimepicker1').datetimepicker({
                                    defaultDate: $.now(),
									format: 'YYYY-MM-DD',
									viewMode: 'years'
								});
							});
						</script>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="season">Season<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type='text' class="form-control" name="season" id='datetimepicker2' value="<?php echo ($this->input->get('season') !== null) ? $this->input->get('season') : set_value('report_date'); ?>" required />
						<script type="text/javascript">
							$(function () {
								$('#datetimepicker2').datetimepicker({
                                    defaultDate: $.now(),
                                    format: 'YYYY',
									viewMode: 'years'
								}); 
							});
						</script>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="total_ph_ws">Total PH WS<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" id="total_ph_ws" name="total_ph_ws" value="<?php echo set_value('total_ph_ws'); ?>" required />
                        <script type="text/javascript">
							$(function () {
								$('#total_ph_ws').focus();
							});
						</script>
					</div>
				</div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="total_donsol_ws">Total Donsol WS<span class="text-info">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="total_donsol_ws" value="<?php echo set_value('total_donsol_ws'); ?>" required />
                    </div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="season_total">Season Total<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="season_total" value="<?php echo set_value('season_total'); ?>" required />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="new_sighting_count">New Sighting Count<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="new_sighting_count" value="<?php echo set_value('new_sighting_count'); ?>" required />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="resighting_count">Resighting Count<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="resighting_count" value="<?php echo set_value('resighting_count'); ?>" required />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="ws_remarks">Remarks</label>
					<div class="col-sm-10">
						<textarea name="ws_remarks" class="form-control" rows="5"><?php echo set_value('ws_remarks'); ?></textarea>
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