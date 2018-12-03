<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Visit Details</h2>
    <h3><?php 
        echo ($visit['trash'] == '1') ? '<i class="fa fa-recycle"></i> ' : '<span class="glyphicon glyphicon-file"></span> ';
        echo $visit['visit_date'] .' visit of <a href="'.site_url('visitors/view/'.$visit['visitor_id']).'">'.strtoupper($visit['fname'].' '.$visit['lname']).'</a>'; 
        ?> 
	<?php if ($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('supervisor') || $this->ion_auth->in_group('encoder')) {
	?>
	<small>[&nbsp;<a href="<?php echo site_url('visits/edit/'.$visit['visit_id']); ?>">Edit</a>&nbsp;]</small>
	<?php
	}
	?>
	</h3>
	<div class="panel panel-default">
		<div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div>
		<div class="panel-body" >
			<div class="row" id="main_content">
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
                        <div class="col-sm-4 control-label">Boarding Pass Code </div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['boarding_pass'])? $visit['boarding_pass'] : '--' ; ?>&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">OR No.</div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['or_no'])? $visit['or_no'] : '--' ; ?>&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">Waiver form signed?</div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['form_signed'] == 1) ? 'Yes' : 'No' ; ?>&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">Staying overnight?</div>
                        <div class="col-sm-8 control-value"><?php echo ($visit['overnight_stay'] == 1) ? 'Yes' : 'No' ; ?>&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">Reason for visit</div>
                        <div class="col-sm-8 control-value">
                            <?php echo ($visit['visit_reason'] == NULL || $visit['visit_reason'] == 0) ? 'Undefined' : '' ; ?>
                            <?php echo ($visit['visit_reason'] == 1) ? 'Destination holiday' : '' ; ?>
                            <?php echo ($visit['visit_reason'] == 2) ? 'Cruise stop-over' : '' ; ?>
                            <?php echo ($visit['visit_reason'] == 3) ? 'Official business' : '' ; ?>
                            <?php echo ($visit['visit_reason'] == 4) ? 'Other' : '' ; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 control-label">Remarks</div>
                        <div class="col-sm-8 control-value"><?php echo $visit['visit_remarks']; ?>&nbsp;</div>
                    </div>
				</div>

				<div class="col-sm-6">
					<div class="row">
                        <div class="col-sm-9 control-label"><b>ACTIVITY DETAILS</b></div>
                    </div>
                    <?php if ($visit['butanding'] == 1) { ?>
                    <div class="row activity-details">
                        <div class="col-sm-9 control-label"><b>Butanding Interaction</b></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 control-label">
                        <?php 
                            echo 'Boat name: &nbsp;'. $vd['butanding']['ab_name']. ' (Accreditation No. '. $vd['butanding']['ab_acc_no'] .')<br />';
                            echo 'BIO name: &nbsp;'. $vd['butanding']['ag_name']. ' (Accreditation No. '. $vd['butanding']['ag_acc_no'] .')<br />';
                        ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($visit['girawan'] == 1) { ?>
                    <div class="row activity-details">
                        <div class="col-sm-9 control-label"><b>Girawan Backyard Tour</b></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 control-label">
                        <?php 
                            echo 'Boat name: &nbsp;'. $vd['girawan']['ab_name']. ' (Accreditation No. '. $vd['girawan']['ab_acc_no'] .')<br />';
                            echo 'Guide name: &nbsp;'. $vd['girawan']['ag_name']. ' (Accreditation No. '. $vd['girawan']['ag_acc_no'] .')<br />';
                        ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($visit['firefly'] == 1) { ?>
                    <div class="row activity-details">
                        <div class="col-sm-9 control-label"><b>River Cruise and Firefly Watching</b></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 control-label">
                        <?php 
                            echo 'Boat name: &nbsp;'. $vd['firefly']['ab_name']. ' (Accreditation No. '. $vd['firefly']['ab_acc_no'] .')<br />';
                            echo 'Guide name: &nbsp;'. $vd['firefly']['ag_name']. ' (Accreditation No. '. $vd['firefly']['ag_acc_no'] .')<br />';
                        ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($visit['island_hop'] == 1) { ?>
                    <div class="row activity-details">
                        <div class="col-sm-9 control-label"><b>Island Hopping</b></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 control-label">
                        <?php 
                            echo 'Boat name: &nbsp;'. $vd['island_hop']['ab_name']. ' (Accreditation No. '. $vd['island_hop']['ab_acc_no'] .')<br />';
                            echo 'Guide name: &nbsp;'. $vd['island_hop']['ag_name']. ' (Accreditation No. '. $vd['island_hop']['ag_acc_no'] .')<br />';
                        ?>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="row">
                        <div class="col-sm-12 control-label" style="text-align:right">
                            <i class="fas fa-print"></i> &nbsp; <button type="button" id="btn_printpass" class="btn btn-sm">Print Boarding Pass</button>
                        </div>
                    </div>
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

<!-- FOR PRINTING -->
<div id="boarding_pass_content" style="margin-top: -50px">
    <table style="width: 100%">
        <tr>
            <td colspan="2">
                <h1 style="margin: 0; padding: 0"><?php echo ($visit['boarding_pass'])? $visit['boarding_pass'] : '--' ; ?></h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px 0 0 40px" width="45%" valign="top">
                <h2 style="margin: 0; padding: 0"><?php echo strtoupper($visit['fname'].' '.$visit['lname']); ?></h2> 
                <br />
                Official Receipt No. <?php echo ($visit['or_no'])? $visit['or_no'] : '--' ; ?><br />
                <?php 
                    $visit_date = strtotime($visit['visit_date']);
                    echo date('m/d/Y H:i:s', $visit_date);
                ?>
                <div id="qrcode"></div>
            </td>
            <td width="55%">
                <div style="border-left: 2px solid grey; padding-left: 20px; height: 220px">
                <?php 
                //Butanding Activity Details
                if ($visit['butanding'] == 1) { 
                ?>
                <b>Butanding Interaction</b><br />
                    <?php 
                        echo 'Boat name: &nbsp;'. $vd['butanding']['ab_name']. ' ('. $vd['butanding']['ab_acc_no'] .')<br />';
                        echo 'BIO name: &nbsp;'. $vd['butanding']['ag_name']. ' ('. $vd['butanding']['ag_acc_no'] .')<br />';
                    ?>
                <?php } ?>
                
                <?php 
                //Girawan Activity Details
                if ($visit['girawan'] == 1) { 
                ?>
                <b>Girawan Backyard Tour</b><br />
                    <?php 
                        echo 'Boat name: &nbsp;'. $vd['girawan']['ab_name']. ' ('. $vd['girawan']['ab_acc_no'] .')<br />';
                        echo 'Guide name: &nbsp;'. $vd['girawan']['ag_name']. ' ('. $vd['girawan']['ag_acc_no'] .')<br />';
                    ?>
                <?php } ?>
                
                <?php 
                //River Cruise Details
                if ($visit['firefly'] == 1) { 
                ?>
                <b>River Cruise and Firefly Watching</b><br />
                    <?php 
                        echo 'Boat name: &nbsp;'. $vd['firefly']['ab_name']. ' ('. $vd['firefly']['ab_acc_no'] .')<br />';
                        echo 'Guide name: &nbsp;'. $vd['firefly']['ag_name']. ' ('. $vd['firefly']['ag_acc_no'] .')<br />';
                    ?>
                <?php } ?>
                
                <?php 
                //Island Hopping Details
                if ($visit['island_hop'] == 1) { 
                ?>
                <b>Island Hopping</b><br />
                    <?php 
                        echo 'Boat name: &nbsp;'. $vd['island_hop']['ab_name']. ' ('. $vd['island_hop']['ab_acc_no'] .')<br />';
                        echo 'Guide name: &nbsp;'. $vd['island_hop']['ag_name']. ' ('. $vd['island_hop']['ag_acc_no'] .')<br />';
                    ?>
                <?php } ?>

                </div>
            </td>
        </tr>
    </table>

</div>

<!-- ADDITIONAL STYLES, SCRIPTS, ETC. -->

<style type="text/css">

@media screen {
    #boarding_pass_content {
        display: none;
    }
}

/*print-ready screen*/
@media print {
    
    #boarding_pass_content {
        background-color: red;
    }

}
</style>

<script>
    ('#qrcode').qrcode({
		text	: "http://infragrey.com"
	});	
</script>

<script>
    
    $(function() {
        
        //generate qr code
        //jquery('#qrcode').qrcode("this plugin is great");

        //prep boarding pass for printing
        $('#btn_printpass').printPreview({
            obj2print:'#boarding_pass_content',
            style: "<style>#boarding_pass_content:background:red;</style>",
            width:'670',
            height: '300',
            top: 200,
            left:'center',
            resizable : 'no',
            scrollbars:'no',
            status:'no',
            title:'Print Preview'
        });

    });

</script>
