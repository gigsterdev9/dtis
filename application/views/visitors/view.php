<?php
$visitor_id = sprintf("%'.05d\n", $visitor['visitor_id']);
?>
<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Visitor Details</h2>
	<h3><?php echo ($visitor['trash'] == '1') ? '<i class="fa fa-recycle"></i> ' : '<span class="glyphicon glyphicon-file"></span> ' ?>
        <?php echo strtoupper($visitor['fname'].' '.$visitor['lname'].' ('.$visitor['first_visit_year'].'-'.$visitor_id.')'); ?> 
	<?php if ($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('supervisor') || $this->ion_auth->in_group('encoder')) {
	?>
	<small>[&nbsp;<a href="<?php echo site_url('visitors/edit/'.$visitor['visitor_id']); ?>">Edit</a>&nbsp;]</small>
	<?php
	}
	?>
	</h3>
	<div class="panel panel-default">
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
                        <div class="col-sm-9 control-value"><?php echo $visitor['bdate'].' ('.$visitor['age'].')'; ?>&nbsp;</div>

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

                        <div class="col-sm-3 control-label">Status Code</div>
                        <div class="col-sm-9 control-value">
                            <?php 
                            switch ($visitor['status_code']) {
                                case '0' : echo '(0) Undefined'; break;
                                case '1' : echo '(1) Welcome'; break;
                                case '2' : echo '(2) Conditional Entry'; break;
                                case '3' : echo '(3) Total Ban'; break;
                            } 
                            ?>
                            &nbsp;
                        </div>
                        <div class="col-sm-3 control-label">Remarks</div>
                        <div class="col-sm-9 control-value"><?php echo $visitor['remarks']; ?>&nbsp;</div>
                    </div>
				</div>

			</div>
		</div>
		
		<div class="visit-history-details text-left">
			<h3>VISIT HISTORY</h3>
			<div class="table-responsive show-records" >
			<?php 
			if (isset($visits[0]['visitor_id'])) {  
			?>
				<div class="text-right"><a href="<?php echo base_url('visits/add_exist/'.$visits[0]['visitor_id']); ?>">
					<span class="glyphicon glyphicon-plus-sign"></span> New Entry </a>
				</div>
			<?php 
			}
			else{
			?>
				<small>[ <a href="<?php echo base_url('visits/add_exist/'.$visitor['visitor_id']) ?>">New Entry</a> ]</small>
			<?php 
			}
			if (isset($visits[0]['visitor_id'])) { ?> 
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="2%">&nbsp;</th>
						<th width="10%">Visit Date</th>
                        <th width="10%">OR No.</th>
						<th width="6%">Butanding</th>
						<th width="6%">Girawan</th>
						<th width="6%">Firefly</th>
						<th width="6%">Island Hop</th>
						<th width="6%">Waiver</th>
						<th width="25%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						foreach ($visits as $v): 
						//echo '<pre>'; print_r($v); echo '</pre>';
						if (is_array($v)) { //do not display 'result_count' 
					?>
					<tr>
						<td>
							<a href="<?php echo site_url('visits/view/'.$v['visit_id']); ?>">
								<span class="glyphicon glyphicon-file"></span> 
							</a>
						</td>
						<td>
							<a href="<?php echo site_url('visits/view/'.$v['visit_id']); ?>">
								<?php echo $v['visit_date'] ?>
							</a>
						</td>
                        <td><?php echo $v['or_no']; ?></td>
                        <td><?php echo ($v['butanding'] == 1) ? 'Yes' : 'No'; ?></td>
                        <td><?php echo ($v['girawan'] == 1) ? 'Yes' : 'No'; ?></td>
                        <td><?php echo ($v['firefly'] == 1) ? 'Yes' : 'No'; ?></td>
                        <td><?php echo ($v['island_hop'] == 1) ? 'Yes' : 'No'; ?></td>
                        <td><?php echo ($v['form_signed'] == 1) ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $v['visit_remarks']; ?></td>
					</tr>
					<?php 
						}
						endforeach;
					?>
				</tbody>
			</table>
			<?php 
			} 
			else{
				echo 'No prior visits on record.';
			}
			?>
			
			</div>

			<div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div>
		</div>


		<?php 
		//show change history if admin
		if ($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('supervisor')) {
		?>
		<div class="mod-history-details text-left">
			<button type="button" class="btn btn-sm" data-toggle="collapse" data-target="#history">Data change log</button>
			<div class="col-sm-12 buffer">&nbsp;</div>
			<div id="history" class="collapse">
				<?php
					//debug
					//echo '<pre>'; print_r($tracker); echo '</pre>';
					if ($tracker['modified'] != NULL) {
						echo 'Modified: : <br />';
						foreach ($tracker['modified'] as $track) 
						{
							echo $track['timestamp'].' by '.ucfirst($track['user']).'<br >';
							$mod_details = str_replace('|', '<br  />', $track['mod_details']);
							echo 'Details: <br />'.$mod_details.'<br /><br />';
						}
					}
					else{
						echo 'No modifications since.';
					}
					echo '<br />';
					if ($tracker['created'] != NULL) {
						echo 'Created: '.$tracker['created']['timestamp'].' by '.ucfirst($tracker['created']['user']);
					}
					else{
						echo 'Creation date undefined.';
					}
				?>
			</div>
		</div>
		<?php
		}
		?>

	</div>
</div>
