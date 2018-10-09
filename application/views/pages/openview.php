<div class="container">
	<h2><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $title; ?></h2>
	<p>&nbsp;</p>
	<div class="panel panel-default">
    	<div class="panel-heading">
	        <strong><span class="glyphicon glyphicon-th-list"></span> WS Photo ID: Season Data</strong>
		</div>
		<div class="panel-body">
            <table class="table-bordered table-condensed">
		    <tr>
				<td class="text-center" width="16%" valign="top" colspan="5">
				    Report Date:<br /><span style="font-size: 2em"><?php echo $ws_pid['report_date'] ?></span>
				</td>
            </tr>
            <tr>
				<td class="text-center" width="16%" valign="top">
				    <span style="font-size: 2em"><?php echo $ws_pid['total_ph_ws'] ?></span>
				    <br />Total Ph WS
				</td>
				<td class="text-center" width="16%" valign="top">
				    <span style="font-size: 2em"><?php echo $ws_pid['total_donsol_ws'] ?></span>
				    <br />Total Donsol WS
				</td>
			   	<td class="text-center" width="16%" valign="top">
				    <span style="font-size: 2em"><?php echo $ws_pid['season_total'] ?></span>
				    <br />Season Total
				</td>
				<td class="text-center" width="16%" valign="top">
				    <span style="font-size: 2em"><?php echo $ws_pid['new_sighting_count'] ?></span>
				    <br />New Sightings
				</td>
                <td class="text-center" width="16%" valign="top">
				    <span style="font-size: 2em"><?php echo $ws_pid['resighting_count'] ?></span>
				    <br />Repeat Sightings
				</td>
			</tr>
            <tr>
                <td class="text-center" width="100%" valign="top" colspan="5">
                    <div style="text-left">Notes:</div>
				    <?php echo $ws_pid['ws_remarks'] ?>
				</td>
            </tr>
		    </table>
		</div>
	</div>
</div>
