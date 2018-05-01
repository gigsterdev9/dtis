<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; <?php echo $title; ?></h2>
	<?php
	if ($this->ion_auth->in_group('admin'))
	{
	?>
	<div class="container-fluid text-right"><a href="<?php echo base_url('activities/firefly/add') ?>"><span class="glyphicon glyphicon-plus-sign"></span> New entry</a></div>
	<?php
	}
	?>
	<p>&nbsp;</p>
    <div class="container-fluid" style="padding: 0">
        <div class="row">
            <div class="col-sm-6" >

                <div class="text-left">
                <?php 
                    $attributes = array('class' => 'form-inline', 'role' => 'form', 'method' => 'GET');
                    echo form_open('activities/firefly', $attributes); 
                ?>
                    <div class="form-group">
                        <label class="control-label" for="title">Filter by:</label> &nbsp; 
                        <select name="filter_by" id="filter_by" class="form-control	">
                            <option value="">Select</option>
                            <option value="date">Date</option>
                        </select>
                        <select name="filter_by_date_operand" id="filter_by_date_operand" class="form-control" style="display:none">
                            <option value="">Select</option>
                            <option value="on">On</option>
                            <option value="before">Before</option>
                            <option value="after">After</option>
                            <option value="between">Between</option>
                        </select>
                        <input type="input" class="form-control" name="filter_by_date_value" id="filter_by_date_value" size="22" style="display:none" />
                        <input type="submit" class="form-control" value="&raquo;" />
                    </div>
                <?php echo form_close();?>
                </div>

            </div>
            <div class="col-sm-6" style="padding: 0">
                &nbsp;
            </div>
        </div>
    </div>
		
	<h3>
		<!-- <span class="glyphicon glyphicon-folder-open"></span>&nbsp; firefly -->
        <hr />
	</h3>
	<div class="container-fluid message"><?php echo $firefly['result_count'] ?> records found. 
		<?php 
			if (isset($filterval)) {
				$filter = (is_array($filterval)) ? '<br />Filter parameters: '. ucfirst($filterval[0]).' / '.$filterval[1] .' '. $filterval[2] : '' ; 
				echo strtoupper($filter); 
			}
			if (isset($searchval)){
				$search = '<br />Search parameters: '. ucfirst($searchval);
				echo strtoupper($search);
			}
		?>
	</div> 
	
    <div class="panel panel-default">
		<div class="table-responsive show-records">
		
			<?php if ($firefly['result_count'] > 0) { ?>	
			<div class="page-links"><?php echo $links; ?></div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="12%">Visit Date</th>
                        <th width="15%">Visitor Name</th>
                        <th width="10%">Nationality</th>
						<th width="6%">firefly</th>
                        <th width="6%">Girawan</th>
                        <th width="6%">Firefly</th>
                        <th width="6%">Island Hop</th>
                        <th width="6%">Waiver</th>
                        <th width="33%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($firefly as $v): 
						//echo '<pre>'; print_r($v); echo '</pre>';
						if (is_array($v)) { //do not display 'result_count' 
					?>
					<tr>
						<td>
							<a href="<?php echo site_url('firefly/view/'.$v['visit_id']); ?>">
								<span class="glyphicon glyphicon-file"></span> <?php echo $v['visit_date'] ?>
							</a>
						</td>
                        <td><?php echo '<a href="visitors/view/'.$v['visitor_id'].'">'.strtoupper($v['lname'].', '.$v['fname']).'</a>'; ?></td>
                        <td><?php echo $v['nationality']; ?></td>
						<td><?php echo ($v['firefly'] == 1) ? 'Yes' : 'No'; ?></td>
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
			<div class="page-links"><?php echo $links; ?></div>

			<?php } ?>

		</div>
	</div>

    <div class="container-fluid">
		<small>
        <?php 
            /*
			if (isset($filterval)) { 
				$url = 'firefly/filtered_to_excel/'.$filterval[0].'/'.$filterval[1];
			} 
			else if (isset($searchval)) {
				$url = 'firefly/results_to_excel/'.$searchval;
			}
			else {
				$url = 'firefly/all_to_excel';
			}
            */
            $url = 'firefly/all_to_excel';
            if ($firefly['result_count'] > 0) echo '<a href="'.$url.'" target="_blank"><i class="fas fa-file-excel"></i> Export to Excel &raquo;</a>';	
				//echo '<a href="#">Export to Excel &raquo;</a>';	
		?>
		</small>
	</div>

</div>
<script>
	$('#filter_by').on('change', function(){
		var myval = $(this).val();
		//alert(myval);
		
		switch (myval) {
			case 'nationality':
				$('#filter_by_nationality').show();
					$('#filter_by_nationality').prop('disabled', false);
				$('#filter_by_date_operand').hide();
					$('#filter_by_date_operand').prop('disabled', true);
				$('#filter_by_date_value').hide();
					$('#filter_by_date_value').prop('disabled', true);
				break;
			case 'date':
				$('#filter_by_nationality').hide();
					$('#filter_by_nationality').prop('disabled', true);
				$('#filter_by_date_operand').show();
					$('#filter_by_date_operand').prop('disabled', false);
				$('#filter_by_date_value').show();
					$('#filter_by_date_value').prop('disabled', false);
				break;
			default:
			
		}

	});


	$('#filter_by_date_operand').on('change', function(){
		var myval = $(this).val();
		
		if (myval == 'between') {
			$('#filter_by_date_value').attr("placeholder", "2018-02-10 and 2018-02-30");
		}
		
	});
</script>
