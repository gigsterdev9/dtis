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
                    <?php echo $alert_success; ?> <a href="<?php echo base_url('settings') ?>">Return to Index.</a>
            </div>
            <?php
            }
                
            if (isset($alert_trash)) { 
            ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $alert_trash; ?> <a href="<?php echo base_url('settings') ?>">Return to Index.</a>
            </div>
            <?php
            }
		
                $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'main_form');
				echo form_open('settings/edit/'.$id , $attributes); 
			?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="meta_name">Setting Name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" readonly class="form-control" name="meta_name" value="<?php echo set_value('meta_name', $setting['meta_name']); ?>" />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="meta_description">Description<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" readonly class="form-control" name="meta_description" value="<?php echo set_value('meta_description', $setting['meta_description']); ?>" />
					</div>
				</div>
                <div class="form-group">
					<label class="control-label col-sm-2" for="meta_value">Setting Value<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="meta_value" value="<?php echo set_value('meta_value', $setting['meta_value']); ?>" />
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