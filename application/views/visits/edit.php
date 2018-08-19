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
					<?php echo $alert_success; ?> <a href="<?php echo base_url('visits/view/'.$visit_id) ?>">Return to Previous.</a>
				</div>
			<?php
			}
			
			if (isset($alert_trash)) { 
			?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $alert_trash; ?> <a href="<?php echo base_url('visitors/view/'.$visitor_id) ?>">Return to Visitor Entry.</a>
				</div>
			<?php
			}
			
				//begin form
				$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'main_form');
				echo form_open('visits/edit/'.$visit_id, $attributes); 
			?>
					<div class="form-group">
						<label class="control-label col-sm-2" for="visit_date">Visit date<span class="text-info">*</span></label>
						<div class="col-sm-10">
							<input type='text' class="form-control" name="visit_date" id='datetimepicker1' value="<?php echo set_value('visit_date', $visit['visit_date']); ?>" />
							<script type="text/javascript">
								$(function () {
                                    var end = new Date();

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
						<label class="control-label col-sm-2" for="visitor_fullname">Visitor<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="visitor_fullname" id="visitor_fullname" 
								value="<?php echo (isset($visitor_fullname)) ? $visitor_fullname : set_value('visitor_fullname') ?>" readonly />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="or_no">OR Number<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="or_no" value="<?php echo set_value('or_no', $visit['or_no']); ?>" />
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="boarding_pass">Boarding Pass<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="boarding_pass" value="<?php echo set_value('boarding_pass', $visit['boarding_pass']); ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="form_signed">Form Signed<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<select name="form_signed" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php $select = ($visit['form_signed'] == 0) ? TRUE : FALSE ; echo  set_select('form_signed', '0', $select ); ?> >No</option>
                                <option value="1" <?php $select = ($visit['form_signed'] == 1) ? TRUE : FALSE ; echo  set_select('form_signed', '1', $select ); ?> >Yes</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="butanding">Butanding<span class="text-info">*</span></label>
						<div class="col-sm-4">	
							<select name="butanding" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php $select = ($visit['butanding'] == 0) ? TRUE : FALSE ; echo  set_select('butanding', '0', $select ); ?> >No</option>
                                <option value="1" <?php $select = ($visit['butanding'] == 1) ? TRUE : FALSE ; echo  set_select('butanding', '1', $select ); ?> >Yes</option>
							</select>
						</div>
                        <label class="control-label col-sm-2" for="girawan">Girawan<span class="text-info">*</span></label>
						<div class="col-sm-4">	
							<select name="girawan" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php $select = ($visit['girawan'] == 0) ? TRUE : FALSE ; echo  set_select('girawan', '0', $select ); ?> >No</option>
                                <option value="1" <?php $select = ($visit['girawan'] == 1) ? TRUE : FALSE ; echo  set_select('girawan', '1', $select ); ?> >Yes</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="firefly">Firefly<span class="text-info">*</span></label>
						<div class="col-sm-4">	
							<select name="firefly" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php $select = ($visit['firefly'] == 0) ? TRUE : FALSE ; echo  set_select('firefly', '0', $select ); ?> >No</option>
                                <option value="1" <?php $select = ($visit['firefly'] == 1) ? TRUE : FALSE ; echo  set_select('firefly', '1', $select ); ?> >Yes</option>
							</select>
						</div>
                        <label class="control-label col-sm-2" for="island_hop">Island Hop<span class="text-info">*</span></label>
						<div class="col-sm-4">	
							<select name="island_hop" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php $select = ($visit['island_hop'] == 0) ? TRUE : FALSE ; echo  set_select('island_hop', '0', $select ); ?> >No</option>
                                <option value="1" <?php $select = ($visit['island_hop'] == 1) ? TRUE : FALSE ; echo  set_select('island_hop', '1', $select ); ?> >Yes</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="visit_remarks">Remarks</label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="visit_remarks" value="<?php echo set_value('visit_remarks', $visit['visit_remarks']); ?>" />
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="delete">Delete</label>
						<div class="col-sm-10">
							<input type="checkbox" id="trash" name="trash" value="1" <?php if (set_value('trash', $visit['trash']) == '1') echo 'checked' ?> />
						</div>
					</div>	
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<!-- audit trail temp values -->
							<input type="hidden" id="altered" name="altered" value="" />
							<!-- audit trail temp values -->
							<input type="hidden" name="action" value="1" />
                            <input type="hidden" name="visitor_id" value="<?php echo $visitor_id ?>" />
							<input type="hidden" name="visit_id" value="<?php echo $visit_id ?>" />
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