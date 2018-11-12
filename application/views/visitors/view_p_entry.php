<?php
$visitor_id = sprintf("%'.05d\n", $visitor['visitor_id']);
$move_link = base_url('visitors/move_entry/'.$visitor['visitor_id']); //echo $move_link; die();
$remove_link = base_url('visitors/remove_entry/'.$visitor['visitor_id']); //echo $move_link; die();
?>
<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Visitor Details (Partner Entry)</h2>
	<h3><?php echo ($visitor['trash'] == '1') ? '<i class="fa fa-recycle"></i> ' : '<span class="glyphicon glyphicon-file"></span> ' ?>
        <?php echo strtoupper($visitor['fname'].' '.$visitor['lname']); ?> 
	<?php if ($this->ion_auth->in_group('admin'))
	{
	?>
	<small>[&nbsp;<a href="#" id="add_to_main">Add</a >&nbsp;|&nbsp;<a href="#" id="trash">Remove</a>&nbsp;]</small>
    <?php
	}
	?>
	</h3>
	<div class="panel panel-default partner-entry-bar">
		<div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div>
		<div class="panel-body">
			<div class="row">
				<?php
				if (isset($alert_success)) 
				{ 
				?>
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?php echo $alert_success; ?> <a href="<?php echo base_url('visitors') ?>">Return to Index.</a>
					</div>
				<?php
				}
				?>
				<div class="col-sm-6" >
                    <div class="row">
                        <div class="col-sm-3 control-label">First Name</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['fname']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Middle Name</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['mname']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Last Name</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['lname']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Birthdate</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['bdate']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Gender</div>
                        <div class="col-sm-9 control-value">
                            <?php 
                            switch ($visitor['gender']) {
                                case 'M': echo 'Male'; break;
                                case 'F': echo 'Female'; break;
                                default:
                            }
                            ?>&nbsp;
                        </div>

                        <div class="col-sm-3 control-label">Civil Status</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['civil_status']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label" >Nationality</div>
                        <div class="col-sm-9 control-value" ><?php echo $visitor['nationality']; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>

                        <div class="col-sm-3 control-label">Home Address</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['h_address']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Occupation</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['occupation']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Biz Address</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['b_address']; ?>&nbsp;</div>
                    </div>
				</div>

				<div class="col-sm-6">
					<div class="row">
                        <div class="col-sm-3 control-label">Mobile No.</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['mobile_no']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Email</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['email']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label" >Biz Phone</div>
                        <div class="col-sm-9 control-value" ><?php echo $visitor['b_contact_no']; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>

                        <div class="col-sm-3 control-label">Diver?</div>
                        <div class="col-sm-3 control-value"><?php echo ($visitor['diver']==1) ? 'Yes' : 'No' ; ?>&nbsp;</div>
                        <div class="col-sm-3 control-label">Swimmer?</div>
                        <div class="col-sm-3 control-value"><?php echo ($visitor['swimmer']==1) ? 'Yes' : 'No' ; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>
                        <div class="col-sm-12 control-label"><b>Emergency Contact:</b></div>
                        
                        <div class="col-sm-3 control-label">Name</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['ice_fullname']; ?>&nbsp;</div>
                        
                        <div class="col-sm-3 control-label">Contact Nos.</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['ice_contact_nos']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Address</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['ice_address']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Relationship to Contact</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['ice_relationship']; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>

                        <div class="col-sm-3 control-label">Remarks</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['remarks']; ?>&nbsp;</div>
                    </div>
				</div>

			</div>
		</div>
		
		<div class="visit-history-details text-left">
			<h3>Status</h3>
			<div class="table-responsive show-records" >
                <?php  //echo '<pre>'; print_r($visitor_match); echo '</pre>';
                    if ($visitor_match['result_count'] > 0) {
                    echo 'Possible duplicate(s) found.';
                    foreach ($visitor_match as $v) {
                        if ($v['visitor_id'] != NULL) {
                            echo '<div class="radio"><label>';
                            echo '<a href="'.base_url('visitors/view/'.$v['visitor_id']).'" target="_blank">';
                            echo 'ID No. '.$v['visitor_id'].'  &nbsp; | &nbsp; Address: '.$v['h_address'].'  &nbsp; | &nbsp; Nationality: '.$v['nationality'].'  &nbsp; | &nbsp; Email: '.$v['email'];
                            echo '</a></label></div>';
                        
                            $v_ids[] = $v['visitor_id'];
                        }
                    }
                } 
                else{
                    echo 'No similar entries found.';
                }
                ?>
			</div>

			<div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div>
		</div>

	</div>
</div>

<script>
$(function () {
	
    $('#add_to_main').on('click', function () {
		$.confirm({
			title: 'Confirm ADD to registry',
			content: 'Are you sure?',
            type: 'red',
            animation: 'top',
			buttons: {
				confirm: function () {
					
                    $(".panel-body").load("<?php echo $move_link ?>");
                    $(".visit-history-details").text(''); //clear status section
                    
                    
				},
				cancel: function () {
					//nothing
				}
			}

		});
	});

	$('#trash').on('click', function () {
		$.confirm({
			title: 'Confirm REMOVE',
			content: 'Are you sure?',
            type: 'red',
            animation: 'top',
			buttons: {
				confirm: function () {
					
                    $(".panel-body").load("<?php echo $remove_link ?>");
                    $(".visit-history-details").text(''); //clear status section

				},
				cancel: function () {
					//nothing
				}
			}

		});
	});

});		
</script>