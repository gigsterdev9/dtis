<div class="container">
	<h2><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $title; ?></h2>
	<div class="container-fluid text-right">
		<a href="<?php echo base_url('photoid/add') ?>">
		<span class="glyphicon glyphicon-plus-sign"></span> New report</a>
	</div>
	<p>&nbsp;</p>
	<div class="container-fluid text-right">
        &nbsp;
        <!--
		<?php 
			$attributes = array('class' => 'form-inline', 'role' => 'form');
			echo form_open('users/', $attributes); 
		?>
			<div class="form-group">
				<label class="control-label" for="title">Search User</label> &nbsp; 
				<input type="input" class="form-control" name="search_param" />
				<input type="submit" class="form-control" value="&raquo;" />
			</div>
		<?php echo form_close();?>
        -->
	</div>
	<p>&nbsp;</p>
	<div class="panel panel-default">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="7%">Report ID</th>
						<th width="10%">Report Date</th>
						<th width="10%">Season</th>
						<th width="10%">Total Ph</th>
						<th width="10%">Total Donsol</th>
						<th width="10%">Season Total</th>
                        <th width="10%">New Sighting</th>
                        <th width="10%">Resighting</th>
                        <th width="23%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php
					
					foreach ($ws_pid as $pid) {
					?>
					<tr>
						<td>
							<a href="<?php echo base_url('photoid/edit/'.$pid['report_id']); ?>">
							<span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $pid['report_id']; ?></a>
						</td>
						<td><?php echo $pid['report_date']; ?></td>
                        <td><?php echo $pid['season']; ?></td>
						<td><?php echo $pid['total_ph_ws']; ?></td>
						<td><?php echo $pid['total_donsol_ws']; ?></td>
						<td><?php echo $pid['season_total']; ?></td>
                        <td><?php echo $pid['new_sighting_count']; ?></td>
                        <td><?php echo $pid['resighting_count']; ?></td>
						<td><?php echo $pid['ws_remarks'] ?></td>
					</tr>
					<?php
					}
					
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
