<?php //echo '<pre>'; print_r($_POST); echo '</pre>'; ?>
<div class="container">
<h2><?php echo $title; ?></h2>
<p><a href="javascript:history.go(-1)" ><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a></p>
<div class="panel panel-default">
	<div class="panel-body">
		<p class="small"><span class="text-info">*</span> Indicates a required field</p>
		<div class="text-warning message">
			<?php echo validation_errors(); ?>
			<?php if (isset($errors)) echo 'Error: '.nl2br($errors); ?>
		</div>
		<?php
		if (isset($alert_success)) 
		{ 
		?>
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php echo $alert_success ?> <a href="<?php echo base_url('visitors/view/'.$visitor_id) ?>">Return to visit details.</a>
			</div>
		<?php
		}

			//begin main add visit form
			$attributes = array('class' => 'form-horizontal', 'role' => 'form', 'id' => 'form-new-visit');
			echo form_open('visits/add_exist/'.$visitor_id, $attributes); 
		?>
				<!-- begin: hidden div -->
				<div class="with-match" id="with-match">
                    <div class="form-group">
						<label class="control-label col-sm-2" for="visitor_fullname">Visitor<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="visitor_fullname" id="visitor_fullname" 
								value="<?php echo (isset($visitor_fullname)) ? $visitor_fullname : set_value('visitor_fullname') ?>" readonly />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="visit_date">Visit date<span class="text-info">*</span></label>
						<div class="col-sm-10">
							<input type='text' class="form-control" name="visit_date" id='datetimepicker1' value="<?php echo set_value('visit_date'); ?>" />
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
						<label class="control-label col-sm-2" for="or_no">OR Number<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="or_no" value="<?php echo set_value('or_no'); ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="form_signed">Form Signed<span class="text-info">*</span></label>
						<div class="col-sm-10">	
                            <!--
							<select name="form_signed" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php echo  set_select('form_signed', '0'); ?> >No</option>
                                <option value="1" <?php echo  set_select('form_signed', '1'); ?> >Yes</option>
							</select>
                            -->
                            <input type="radio" id="form_signed" name="form_signed" value="1" <?php echo set_radio('form_signed', '1'); ?> /> Yes
                            <input type="radio" id="form_signed" name="form_signed" value="0" <?php echo set_radio('form_signed', '0'); ?> /> No
						</div>
					</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Activities<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="control-label col-sm-auto" for="butanding">Butanding<span class="text-info">*</span></label>
                                    <input type="radio" id="butanding" name="butanding" value="1" <?php echo set_radio('butanding', '1'); ?> /> Yes
                                    <input type="radio" id="butanding" name="butanding" value="0" <?php echo set_radio('butanding', '0'); ?> /> No
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label col-sm-auto" for="girawan">Girawan<span class="text-info">*</span></label>
                                    <input type="radio" id="girawan" name="girawan" value="1" <?php echo set_radio('girawan', '1'); ?> /> Yes
                                    <input type="radio" id="girawan" name="girawan" value="0" <?php echo set_radio('girawan', '0'); ?> /> No
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label col-sm-auto" for="firefly">Firefly<span class="text-info">*</span></label>
                                    <input type="radio" id="firefly" name="firefly" value="1" <?php echo set_radio('firefly', '1'); ?> /> Yes
                                    <input type="radio" id="firefly" name="firefly" value="0" <?php echo set_radio('firefly', '0'); ?> /> No
                                </div>
                                <div class="col-sm-3">	
                                    <label class="control-label col-sm-auto" for="island_hop">Island Hop<span class="text-info">*</span></label>
                                    <input type="radio" id="island_hop" name="island_hop" value="1" <?php echo set_radio('island_hop', '1'); ?> /> Yes
                                    <input type="radio" id="island_hop" name="island_hop" value="0" <?php echo set_radio('island_hop', '0'); ?> /> No
                                    <div class="col-sm-6" id="island_hop-details" style="display:none">
                                        <label class="control-label col-sm-2" for="boat_name">Boat name<span class="text-info">*</span></label>
                                        <input type="text" class="form-control" name="boat_name" value="<?php echo set_value('boat_name'); ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="visit_remarks">Remarks</label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="visit_remarks" value="<?php echo set_value('visit_remarks'); ?>" />
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<!-- audit trail temp values -->
							<input type="hidden" id="altered" name="altered" value="" />
							<!-- audit trail temp values -->
							<input type="hidden" name="ben_id" value="<?php echo (isset($ben_id)) ? $ben_id : set_value('ben_id') ?>" />
							<input type="hidden" name="action" value="1" />
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>

				</div> <!-- end: hidden div -->
			</form> 
			<!--end: main add visit form -->				
	</div>
</div>
</div>

<script type="text/javascript">
$(function() {
	
    $('.activity-type').on('change', function(){
		var e_name = $(this).attr('name');
        var e_val = $(this).val();
		//console.log(myval);
        alert(e_val);
		
        switch (e_name) {
			case 'island_hop':
                $('#island_hop-details').toggle();
				break;
			default:
                break;
		}
        

	});


});
</script>