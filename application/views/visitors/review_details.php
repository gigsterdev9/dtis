<?php
$visitor_id = sprintf("%'.05d\n", $visitor['visitor_id']);
$approve_link = base_url('visitors/approve_changes/'.$visitor['mod_id']); //echo $approve_link; die();
$deny_link = base_url('visitors/deny_changes/'.$visitor['mod_id']); //echo $deny_link; die();
?>
<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Changes to visitor details (Under Review)</h2>
	<h3><?php echo ($visitor['trash'] == '1') ? '<i class="fa fa-recycle"></i> ' : '<span class="glyphicon glyphicon-file"></span> ' ?>
        <?php echo strtoupper($visitor['fname'].' '.$visitor['lname']); ?> 
	<?php if ($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('supervisor'))
	{
	?>
	<small>[&nbsp;<a href="#" id="approve_changes">Approve</a >&nbsp;|&nbsp;<a href="#" id="deny_changes">Deny</a>&nbsp;]</small>
    <?php
	}
	?>
	</h3>
	<div class="panel panel-default partner-entry-bar" id="main_content">
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
                        <div class="col-sm-9 control-value" id="fname" ><?php echo $visitor['fname']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Middle Name</div>
                        <div class="col-sm-9 control-value" id="mname" ><?php echo $visitor['mname']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Last Name</div>
                        <div class="col-sm-9 control-value" id="lname" ><?php echo $visitor['lname']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Birthdate</div>
                        <div class="col-sm-9 control-value" id="bdate" ><?php echo $visitor['bdate']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Gender</div>
                        <div class="col-sm-9 control-value" id="gender" >
                            <?php 
                            switch ($visitor['gender']) {
                                case 'M': echo 'Male'; break;
                                case 'F': echo 'Female'; break;
                                default:
                            }
                            ?>&nbsp;
                        </div>

                        <div class="col-sm-3 control-label">Civil Status</div>
                        <div class="col-sm-9 control-value" id="civil_status" ><?php echo $visitor['civil_status']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label" >Nationality</div>
                        <div class="col-sm-9 control-value" id="nationality" ><?php echo $visitor['nationality']; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>

                        <div class="col-sm-3 control-label">Home Address</div>
                        <div class="col-sm-9 control-value" id="h_address" ><?php echo $visitor['h_address']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Occupation</div>
                        <div class="col-sm-9 control-value" id="occupation" ><?php echo $visitor['occupation']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Biz Address</div>
                        <div class="col-sm-9 control-value" id="b_address" ><?php echo $visitor['b_address']; ?>&nbsp;</div>
                    </div>
				</div>

				<div class="col-sm-6">
					<div class="row">
                        <div class="col-sm-3 control-label">Mobile No.</div>
                        <div class="col-sm-9 control-value" id="mobile_no" ><?php echo $visitor['mobile_no']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Email</div>
                        <div class="col-sm-9 control-value" id="email" ><?php echo $visitor['email']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label" >Biz Phone</div>
                        <div class="col-sm-9 control-value" id="b_contact_no" ><?php echo $visitor['b_contact_no']; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>

                        <div class="col-sm-3 control-label">Diver?</div>
                        <div class="col-sm-3 control-value" id="diver" ><?php echo ($visitor['diver']==1) ? 'Yes' : 'No' ; ?>&nbsp;</div>
                        <div class="col-sm-3 control-label">Swimmer?</div>
                        <div class="col-sm-3 control-value" id="swimmer" ><?php echo ($visitor['swimmer']==1) ? 'Yes' : 'No' ; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>
                        <div class="col-sm-12 control-label"><b>Emergency Contact:</b></div>
                        
                        <div class="col-sm-3 control-label">Name</div>
                        <div class="col-sm-9 control-value" id="ice_fullname" ><?php echo $visitor['ice_fullname']; ?>&nbsp;</div>
                        
                        <div class="col-sm-3 control-label">Contact Nos.</div>
                        <div class="col-sm-9 control-value" id="ice_contact_nos" ><?php echo $visitor['ice_contact_nos']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Address</div>
                        <div class="col-sm-9 control-value" id="ice_address" ><?php echo $visitor['ice_address']; ?>&nbsp;</div>

                        <div class="col-sm-3 control-label">Relationship to Contact</div>
                        <div class="col-sm-9 control-value" id="ice_relationship" ><?php echo $visitor['ice_relationship']; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>

                        <div class="col-sm-3 control-label">Remarks</div>
                        <div class="col-sm-9 control-value" id="remarks" ><?php echo $visitor['remarks']; ?>&nbsp;</div>
                    </div>
				</div>

            </div>    
            <div class="row">
                        <div class="col-sm-12"><hr /></div>
            </div>
            <div class="row">          
                <div class="col-sm-12 control-label">
                    <i>
                    <strong>Reason for edit</strong><br />
                    <?php 
                        //clean up mod_details
                        $mod_details = str_replace('|', '<br />', substr($visitor['mod_details'], 0, strpos($visitor['mod_details'], "| field: mod_reason,")));
                        echo $visitor['mod_reason'] . '<br /><br />';
                        echo $mod_details;
                    
                    ?>
                    </i>
                </div>
			</div>
		
		</div>

	</div>
</div>

<script>
$(function () {
	
    $('#approve_changes').on('click', function () {
		$.confirm({
			title: 'Confirm approval of changes',
			content: 'Are you sure?',
            type: 'red',
            animation: 'top',
			buttons: {
				confirm: function () {
					
                    $(".panel-body").load("<?php echo $approve_link ?>");
                    $(".main_content").text('Return to Review Index'); //clear status section
                    
                    
				},
				cancel: function () {
					//nothing
				}
			}

		});
	});

	$('#deny_changes').on('click', function () {
		$.confirm({
			title: 'Confirm denial of changes',
			content: 'Are you sure?',
            type: 'red',
            animation: 'top',
			buttons: {
				confirm: function () {
					
                    $(".panel-body").load("<?php echo $deny_link ?>");
                    $(".main_content").text('Return to Review Index'); //clear status section

				},
				cancel: function () {
					//nothing
				}
			}

		});
	});

    //highlight fields that have edits
    <?php 
    $visitor['mod_fields'] = str_replace(',mod_reason,','',$visitor['mod_fields']);
    $fields = explode(',', $visitor['mod_fields']);

        foreach ($fields as $f):
    ?>
        $('#<?php echo $f ?>').css('color', 'red');

    <?php 
        endforeach;
    ?>

});		
</script>