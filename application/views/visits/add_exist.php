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
                                        date: new Date(),
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
						<div class="col-sm-10 control-value-1">	
                            <input type="radio" id="form_signed" name="form_signed" value="1" <?php echo set_radio('form_signed', '1'); ?> /> Yes
                            <input type="radio" id="form_signed" name="form_signed" value="0" <?php echo set_radio('form_signed', '0'); ?> /> No
						</div>
					</div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Activities<span class="text-info">*</span></label>
                        <div class="col-sm-10">
                            <div class="row control-value-1">
                                <div class="col-sm-3">
                                    <label class="control-label col-sm-auto" for="butanding">Butanding<span class="text-info">*</span></label>
                                    <input type="radio" class="butanding" name="butanding" value="1" <?php echo set_radio('butanding', '1'); ?> /> Yes
                                    <input type="radio" class="butanding" name="butanding" value="0" <?php echo set_radio('butanding', '0'); ?> /> No
                                    <p>&nbsp;</p>
                                    <div id="bi_details" style="display: none">
                                        BIO/Guide: <br />
                                        <select class="form-control select2-single" id="bi_guide" name="bi_guide" style="width: 100%">
                                            <option value="">Select</option>
                                            <?php 
                                            foreach ($guides as $g) {
                                            ?>
                                                <option value="<?php echo $g['ag_id'] ?>" <?php echo set_select('bi_guide',$g['ag_id']) ?> ><?php echo $g['ag_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select><br />
                                        Boat: <br />
                                        <select class="form-control select2-single" id="bi_boat" name="bi_boat" style="width: 100%">
                                            <option value="">Select</option>
                                            <?php 
                                            foreach ($boats as $b) {
                                            ?>
                                                <option value="<?php echo $b['ab_id'] ?>" <?php echo set_select('bi_boat',$b['ab_id']) ?> ><?php echo $b['ab_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select><br />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label col-sm-auto" for="girawan">Girawan<span class="text-info">*</span></label>
                                    <input type="radio" class="girawan" name="girawan" value="1" <?php echo set_radio('girawan', '1'); ?> /> Yes
                                    <input type="radio" class="girawan" name="girawan" value="0" <?php echo set_radio('girawan', '0'); ?> /> No
                                    <p>&nbsp;</p>
                                    <div id="gt_details" style="display: none">
                                        Guide: <br />
                                        <select class="form-control select2-single" id="gt_guide" name="gt_guide" style="width: 100%">
                                            <option value="">Select</option>
                                            <?php 
                                            foreach ($guides as $g) {
                                            ?>
                                                <option value="<?php echo $g['ag_id'] ?>" <?php echo set_select('gt_guide',$g['ag_id']) ?> ><?php echo $g['ag_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select><br />
                                        Boat: <br />
                                        <select class="form-control select2-single" id="gt_boat" name="gt_boat" style="width: 100%">
                                            <option value="">Select</option>
                                            <?php 
                                            foreach ($boats as $b) {
                                            ?>
                                                <option value="<?php echo $b['ab_id'] ?>" <?php echo set_select('gt_boat',$b['ab_id']) ?> ><?php echo $b['ab_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select><br />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label col-sm-auto" for="firefly">Firefly<span class="text-info">*</span></label>
                                    <input type="radio" class="firefly" name="firefly" value="1" <?php echo set_radio('firefly', '1'); ?> /> Yes
                                    <input type="radio" class="firefly" name="firefly" value="0" <?php echo set_radio('firefly', '0'); ?> /> No
                                    <p>&nbsp;</p>
                                    <div id="fw_details" style="display: none">
                                        Guide: <br />
                                        <select class="form-control select2-single" id="fw_guide" name="fw_guide" style="width: 100%">
                                            <option value="">Select</option>
                                            <?php 
                                            foreach ($guides as $g) {
                                            ?>
                                                <option value="<?php echo $g['ag_id'] ?>" <?php echo set_select('fw_guide',$g['ag_id']) ?> ><?php echo $g['ag_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select><br />
                                        Boat: <br />
                                        <select class="form-control select2-single" id="fw_boat" name="fw_boat" style="width: 100%">
                                            <option value="">Select</option>
                                            <?php 
                                            foreach ($boats as $b) {
                                            ?>
                                                <option value="<?php echo $b['ab_id'] ?>" <?php echo set_select('fw_boat',$b['ab_id']) ?> ><?php echo $b['ab_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select><br />
                                    </div>
                                </div>
                                <div class="col-sm-3">	
                                    <label class="control-label col-sm-auto" for="island_hop">Island Hop<span class="text-info">*</span></label>
                                    <input type="radio" class="island_hop" name="island_hop" value="1" <?php echo set_radio('island_hop', '1'); ?> /> Yes
                                    <input type="radio" class="island_hop" name="island_hop" value="0" <?php echo set_radio('island_hop', '0'); ?> /> No
                                    <p>&nbsp;</p>
                                    <div id="ih_details" style="display: none">
                                        Guide: <br />
                                        <select class="form-control select2-single" id="ih_guide" name="ih_guide" style="width: 100%">
                                            <option value="">Select</option>
                                            <?php 
                                            foreach ($guides as $g) {
                                            ?>
                                                <option value="<?php echo $g['ag_id'] ?>" <?php echo set_select('ih_guide',$g['ag_id']) ?> ><?php echo $g['ag_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select><br />
                                        Boat: <br />
                                        <select class="form-control select2-single" id="ih_boat" name="ih_boat" style="width: 100%">
                                            <option value="">Select</option>
                                            <?php 
                                            foreach ($boats as $b) {
                                            ?>
                                                <option value="<?php echo $b['ab_id'] ?>" <?php echo set_select('ih_boat',$b['ab_id']) ?> ><?php echo $b['ab_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select><br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
						<label class="control-label col-sm-2" for="visit_reason">Reason for Visit</label>
						<div class="col-sm-10 control-value-1">	
                            <input type="radio" id="visit_reason" name="visit_reason" value="1" <?php echo set_radio('visit_reason', '1'); ?> /> Destination Holiday &nbsp; &nbsp; 
                            <input type="radio" id="visit_reason" name="visit_reason" value="2" <?php echo set_radio('visit_reason', '2'); ?> /> Cruise Stop-Over &nbsp; &nbsp; 
                            <input type="radio" id="visit_reason" name="visit_reason" value="3" <?php echo set_radio('visit_reason', '3'); ?> /> Official Business &nbsp; &nbsp; 
                            <input type="radio" id="visit_reason" name="visit_reason" value="4" <?php echo set_radio('visit_reason', '4'); ?> /> Other 
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
                            <input type="hidden" name="visitor_id" value="<?php echo (isset($visitor_id)) ? $visitor_id : set_value('visitor_id') ?>" />
                            <input type="hidden" name="boarding_pass" value="<?php echo $boarding_pass ?>" />
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
	
    $('.butanding').on('change', function(){
		
        var e_val = $(this).val();
		//console.log(myval);
        
        if (e_val == '1') {
            $('#bi_details').show();
        }
        else{
            $('#bi_guide').prop('selectedIndex',0);
            $('#bi_boat').prop('selectedIndex',0);
            $('#bi_details').hide();
            //$.alert($('#bi_guide').val());
        }
        

	});

    $('.girawan').on('change', function(){
		
        var e_val = $(this).val();
		//console.log(myval);
        
        if (e_val == '1') {
            $('#gt_details').show();
        }
        else{
            $('#gt_guide').prop('selectedIndex',0);
            $('#gt_boat').prop('selectedIndex',0);
            $('#gt_details').hide();
            //$.alert($('#gt_guide').val());
        }
        

	});
    

    $('.firefly').on('change', function(){
		
        var e_val = $(this).val();
		//console.log(myval);
        
        if (e_val == '1') {
            $('#fw_details').show();
        }
        else{
            $('#fw_guide').prop('selectedIndex',0);
            $('#fw_boat').prop('selectedIndex',0);
            $('#fw_details').hide();
        }
        

	});


    $('.island_hop').on('change', function(){
		
        var e_val = $(this).val();
		//console.log(myval);
        
        if (e_val == '1') {
            $('#ih_details').show();
        }
        else{
            $('#ih_guide').prop('selectedIndex',0);;
            $('#ih_boat').prop('selectedIndex',0);
            $('#ih_details').hide();
        }
        

	});

});
</script>