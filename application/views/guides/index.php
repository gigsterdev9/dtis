<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; <?php echo $title; ?></h2>
	<?php
	if ($this->ion_auth->in_group('admin'))
	{
	?>
	<div class="container-fluid text-right"><a href="<?php echo base_url('guides/add') ?>"><span class="glyphicon glyphicon-plus-sign"></span> New entry</a></div>
	<?php
	}
	?>
	<p>&nbsp;</p>
    <div class="container-fluid" style="padding: 0">
        <div class="row">
            <div class="col-sm-6" >
                <!--
                <div class="text-left">
                <?php 
                    $attributes = array('class' => 'form-inline', 'role' => 'form', 'method' => 'GET');
                    echo form_open('guides', $attributes); 
                ?>
                    <div class="form-group">
                        <label class="control-label" for="title">Filter by:</label> &nbsp; 
                        <select name="filter_by" id="filter_by" class="form-control	">
                            <option value="">Select</option>
                            <option value="ab_acc_no">Accreditation No.</option>
                            <option value="ab_acc_yr">Accreditation Year</option>
                            <option value="ab_acc_expiry">Accredition Expiry Year</option>
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
                -->
            </div>
            <div class="col-sm-6" style="padding: 0">
                &nbsp;
            </div>
        </div>
    </div>
		
	<h3>
		<!-- <span class="glyphicon glyphicon-folder-open"></span>&nbsp; guides -->
        <hr />
	</h3>
	<div class="container-fluid message"><?php echo $guides['result_count'] ?> records found. 
        <?php 
        /**
			if (isset($filterval)) {
				$filter = (is_array($filterval)) ? '<br />Filter parameters: '. ucfirst($filterval[0]).' / '.$filterval[1] .' '. $filterval[2] : '' ; 
				echo strtoupper($filter); 
			}
			if (isset($searchval)){
				$search = '<br />Search parameters: '. ucfirst($searchval);
				echo strtoupper($search);
            }
        */
		?>
	</div> 
	
    <div class="panel panel-default">
		<div class="table-responsive show-records">
		
			<?php if ($guides['result_count'] > 0) { ?>	
			<div class="page-links"><?php echo $links; ?></div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="2%">&nbsp;</th>
						<th width="23%">Guide Name</th>
                        <th width="20%">Accreditation Number</th>
						<th width="15%">Accreditation Year</th>
                        <th width="15%">Expiry Year</th>
                        <th width="25%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						foreach ($guides as $g): 
						//echo '<pre>'; print_r($g); echo '</pre>';
						if (is_array($g)) { //do not display 'result_count' 
					?>
					<tr>
						<td>
                            <i class="far fa-file"></i>
						</td>
						<td><?php echo $g['ag_name'] ?></td>
                        <td><?php echo $g['ag_acc_no'] ?></td>
                        <td><?php echo $g['ag_acc_yr'] ?></td>
                        <td><?php echo $g['ag_acc_expiry'] ?></td>
                        <td><?php echo $g['ag_remarks'] ?></td>
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
				$url = 'guides/filtered_to_excel/'.$filterval[0].'/'.$filterval[1];
			} 
			else if (isset($searchval)) {
				$url = 'guides/results_to_excel/'.$searchval;
			}
			else {
				$url = 'guides/all_to_excel';
			}
            */
            $url = 'guides/all_to_excel';
            if ($guides['result_count'] > 0) echo '<a href="'.$url.'" target="_blank"><i class="fas fa-file-excel"></i> Export to Excel &raquo;</a>';	
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