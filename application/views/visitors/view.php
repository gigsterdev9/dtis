<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Non-Voter Details</h2>
	<h3><?php echo ($visitor['trash'] == '1') ? '<i class="fa fa-recycle"></i> ' : '<span class="glyphicon glyphicon-file"></span> ' ?><?php echo strtoupper($visitor['fname'].' '.$visitor['lname'].' ('.$visitor['visitor_id'].')'); ?> 
	<?php if ($this->ion_auth->in_group('admin'))
	{
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
						<?php echo $alert_success; ?> <a href="<?php echo base_url('grants') ?>">Return to Index.</a>
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
                        <div class="col-sm-9 control-value"><?php echo $visitor['ice_contact_nos']; ?>&nbsp;</div>

                        <div class="col-sm-12 buffer">&nbsp;</div>

                        <div class="col-sm-3 control-label">Status Code</div>
                        <div class="col-sm-9 control-value">
                            <?php 
                            switch ($visitor['status']) {
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
		
		<div class="service-history-details text-left">
			<h3>VISIT HISTORY</h3>
			<div class="table-responsive show-records" >
			<?php if (isset($services[0]['service_id'])) {  ?>
			<div class="text-right"><a href="<?php echo base_url('visits/add_exist/'.$services[0]['ben_id']); ?>"><span class="glyphicon glyphicon-plus-sign"></span> New Entry </a></div>
			<?php } ?>
			<small>[ <a href="<?php echo base_url('visits/add_exist/'.$visitor['visitor_id']) ?>">New Entry</a> ]</small>
			<?php if (isset($services[0]['service_id'])) {   //print_r($services); ?> 
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="2%">&nbsp;</th>
						<th width="10%">Request date</th>
						<th width="10%">Type</th>
						<th width="10%">Amount (Php)</th>
						<th width="15%">Requested by</th>
						<th width="10%">Relationship</th>
						<th width="10%">Status</th>
						<th width="28%">Remarks</th>
						<th widht="5%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						foreach ($visits as $v): 
						//echo '<pre>'; print_r($v); echo '</pre>';
						if (is_array($v)) { //do not display 'result_count' 
					?>
					<tr>
						<td><a href="<?php echo base_url('services/view/'.$service['service_id']) ?>"><span class="glyphicon glyphicon-file"></span></a></td>
						<td><?php echo $service['req_date']; ?></td>
						<td><?php echo ucfirst($service['service_type']); ?></td>
						<td class="text-right"><?php echo number_format($service['amount'], 2); ?></td>
						<td>
							<?php 
								$req_link = base_url('beneficiaries/view/'.$service['req_ben_id']);
								$req_fullname = strtoupper($service['req_lname'].', '.$service['req_fname']);
								echo '<a href="'.$req_link.'">';
								echo $req_fullname;
								echo '</a>';
							?>
						</td>
						<td><?php echo ucfirst($service['relationship']); ?></td>
						<td><?php echo ucfirst($service['s_status']); ?></td>
						<td><?php echo $service['s_remarks']; ?></td>
						<td>
							<a href="<?php echo base_url('services/edit/'.$service['service_id']); ?>"><span class="glyphicon glyphicon-edit"></span></a> &nbsp; 
							<a href="<?php echo base_url('services/delete/'.$service['service_id'].'/'.$service['ben_id']); ?>"><span class="glyphicon glyphicon-remove-circle"></span></a>
						</td>
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
		if ($this->ion_auth->in_group('admin')) {
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
