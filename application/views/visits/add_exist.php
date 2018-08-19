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
						<label class="control-label col-sm-2" for="visitor_fullname">Visitor<span class="text-info">*</span></label>
						<div class="col-sm-10">	
							<input type="text" class="form-control" name="visitor_fullname" id="visitor_fullname" 
								value="<?php echo (isset($visitor_fullname)) ? $visitor_fullname : set_value('visitor_fullname') ?>" readonly />
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
							<select name="form_signed" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php echo  set_select('form_signed', '0'); ?> >No</option>
                                <option value="1" <?php echo  set_select('form_signed', '1'); ?> >Yes</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="butanding">Butanding<span class="text-info">*</span></label>
						<div class="col-sm-4">	
							<select name="butanding" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php echo  set_select('butanding', '0'); ?> >No</option>
                                <option value="1" <?php echo  set_select('butanding', '1'); ?> >Yes</option>
							</select>
						</div>
                        <label class="control-label col-sm-2" for="girawan">Girawan<span class="text-info">*</span></label>
						<div class="col-sm-4">	
							<select name="girawan" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php echo  set_select('girawan', '0'); ?> >No</option>
                                <option value="1" <?php echo  set_select('girawan', '1'); ?> >Yes</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="firefly">Firefly<span class="text-info">*</span></label>
						<div class="col-sm-4">	
							<select name="firefly" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php echo  set_select('firefly', '0'); ?> >No</option>
                                <option value="1" <?php echo  set_select('firefly', '1'); ?> >Yes</option>
							</select>
						</div>
                        <label class="control-label col-sm-2" for="island_hop">Island Hop<span class="text-info">*</span></label>
						<div class="col-sm-4">	
							<select name="island_hop" class="form-control select2-single">
								<option value="">Select</option>
                                <option value="0" <?php echo  set_select('island_hop', '0'); ?> >No</option>
                                <option value="1" <?php echo  set_select('island_hop', '1'); ?> >Yes</option>
							</select>
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
$(document).ready(function() {
	

});
</script>