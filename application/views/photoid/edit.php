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
				<?php echo $alert_success; ?> <a href="<?php echo base_url('photoid') ?>">Return to Index.</a>
			</div>
		<?php
		}
		
		if (isset($alert_trash)) { 
		?>
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $alert_trash; ?> <a href="<?php echo base_url('photoid') ?>">Return to Index.</a>
			</div>
		<?php
		}
	
			//begin form
			$attributes = array('class' => 'form-horizontal', 'role' => 'form');
			echo form_open('photoid/edit', $attributes); 
		?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="report_date">Report Date<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type='text' class="form-control" name="report_date" id='datetimepicker1' 
                            value="<?php echo ($this->input->get('report_date') !== null) ? $this->input->get('report_date') : set_value('report_date', $ws_pid['report_date']); ?>" required />
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
						<input type='text' class="form-control" name="season" id='datetimepicker2' 
                            value="<?php echo ($this->input->get('season') !== null) ? $this->input->get('season') : set_value('season', $ws_pid['season']); ?>" required />
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
						<input type="text" class="form-control" id="total_ph_ws" name="total_ph_ws" value="<?php echo set_value('total_ph_ws', $ws_pid['total_ph_ws']); ?>" required />
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
                        <input type="text" class="form-control" name="total_donsol_ws" value="<?php echo set_value('total_donsol_ws', $ws_pid['total_donsol_ws']); ?>" required />
                    </div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="season_total">Season Total<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="season_total" value="<?php echo set_value('season_total', $ws_pid['season_total']); ?>" required />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="new_sighting_count">New Sighting Count<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="new_sighting_count" value="<?php echo set_value('new_sighting_count', $ws_pid['new_sighting_count']); ?>" required />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="resighting_count">Resighting Count<span class="text-info">*</span></label>
					<div class="col-sm-10">	
						<input type="text" class="form-control" name="resighting_count" value="<?php echo set_value('resighting_count', $ws_pid['resighting_count']); ?>" required />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="ws_remarks">Remarks</label>
					<div class="col-sm-10">
						<textarea name="ws_remarks" class="form-control" rows="5"><?php echo set_value('ws_remarks', $ws_pid['ws_remarks']); ?></textarea>
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="delete">Delete</label>
					<div class="col-sm-10">
						<input type="checkbox" id="trash_flag" name="trash_flag" value="1" <?php if (set_value('trash_flag', $ws_pid['trash_flag']) == '1') echo 'checked' ?> />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
                        <!-- audit trail temp values -->
						<input type="hidden" id="altered" name="altered" value="" />
						<!-- audit trail temp values -->
						<input type="hidden" name="action" value="1" />
						<input type="hidden" name="report_id" value="<?php echo $ws_pid['report_id'] ?>" /> 
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>
	</div>
</div>
</div>
<script>
$(function () {
	
	$("form").submit(function(e){
		
		var x = '';
		
		//step through each input elements
		$('#main_form *').filter(':input').each(function(){
		    var f = $(this).attr('name'); 
			var g = $(this).prop('defaultValue'); 
			var h = $(this).val();
			
			
			if (g != null && g != '0000-00-00') 
			{
				if (g != h) 
				{
					x += 'field: ' + f + ', old value: ' + g + ', new value: ' + h + ' | ';
					console.log(f + '::' + g + '::' + h + '| ');
		    	}
			}
			
		});
		
		//step through each select elements
		//??
		
		$("#altered").val(x);
		//console.log(x);
		
		//alert('submit intercepted');
		//alert(x);
        //e.preventDefault(e);
        
    });

	$('#trash_flag').on('change', function () {
		$.confirm({
			title: 'Confirm Delete',
			content: 'Are you sure?',
			buttons: {
				confirm: function () {
					//nothing
				},
				cancel: function () {
					$('#trash_flag').prop('checked', true); // Checks it
					$('#trash_flag').prop('checked', false); // Unchecks it
				}
			}

		});
	});

});		
</script>