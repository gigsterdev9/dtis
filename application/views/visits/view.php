<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Visit Details</h2>
    <h3><?php 
        echo ($visit['trash'] == '1') ? '<i class="fa fa-recycle"></i> ' : '<span class="glyphicon glyphicon-file"></span> ';
        echo $visit['visit_date'] .' visit of <a href="'.site_url('visitors/view/'.$visit['visitor_id']).'">'.strtoupper($visit['fname'].' '.$visit['lname']).'</a>'; 
        ?> 
	<?php if ($this->ion_auth->in_group('admin'))
	{
	?>
	<small>[&nbsp;<a href="<?php echo site_url('visits/edit/'.$visit['visit_id']); ?>">Edit</a>&nbsp;]</small>
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
                        <div class="col-sm-4 control-label">Waiver form signed?</div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['form_signed'] == 1) ? 'Yes' : 'No' ; ?>&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">Butanding Interaction</div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['butanding'] == 1) ? 'Yes' : 'No' ; ?>&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">Girawan Backyard Tour</div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['girawan'] == 1) ? 'Yes' : 'No' ; ?>&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">River Cruise and <br />Firefly Watching</div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['firefly'] == 1) ? 'Yes' : 'No' ; ?>&nbsp;<br />&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">Island Hopping</div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['island_hop'] == 1) ? 'Yes' : 'No' ; ?>&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">Remarks</div>
                        <div class="col-sm-8 control-value"><?php echo $visit['remarks']; ?>&nbsp;</div>
                    </div>
				</div>

				<div class="col-sm-6">
					<div class="row">
                        <div class="col-sm-9 control-label"><b>ACTIVITY DETAILS</b></div>
                    </div>
                    <?php if ($visit['butanding'] == 1) { ?>
                    <div class="row">
                        <div class="col-sm-9 control-label"><b>Butanding Interaction</b></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 control-label">
                        <?php 
                            echo 'Boarding pass: &nbsp;'. $visit_details['butanding']['boarding_pass'].'<br />';
                            echo 'Boat ID: &nbsp;'. $visit_details['butanding']['boat_id'].'<br />';
                            echo 'BIO name: &nbsp;'. $visit_details['butanding']['bio_name'].'<br />';
                            echo 'OR no.: &nbsp;'. $visit_details['butanding']['or_no'].'<br />';
                            echo 'OR date: &nbsp;'. $visit_details['butanding']['or_date'].'<br /><br />';
                        ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($visit['girawan'] == 1) { ?>
                    <div class="row">
                        <div class="col-sm-9 control-label"><b>Girawan Backyard Tour</b></div>
                    </div>
                    <?php } ?>
                    <?php if ($visit['firefly'] == 1) { ?>
                    <div class="row">
                        <div class="col-sm-9 control-label"><b>River Cruise and Firefly Watching</b></div>
                    </div>
                    <?php } ?>
                    <?php if ($visit['island_hop'] == 1) { ?>
                    <div class="row">
                        <div class="col-sm-9 control-label"><b>Butanding Interaction</b></div>
                    </div>
                    <?php } ?>
				</div>

			</div>
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
