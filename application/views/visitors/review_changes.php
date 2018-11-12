<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; <?php echo $title; ?></h2>
	<p>&nbsp;</p>
    <?php
    if (isset($alert_success)) { 
	?>
	    <div class="alert alert-success">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?php echo $alert_success; ?>
        </div>
	<?php
    }
    ?>
    <h3>
		<hr />
	</h3>
	<div class="container-fluid message"><?php echo $r_entries['result_count'] ?> records found. </div> 
	
    <div class="panel panel-default partner-entry-bar">
		<div class="table-responsive show-records">
		
			<?php if ($r_entries['result_count'] > 0) { ?>	
            <div class="page-links"><?php echo $links; ?></div>
            <?php
                $attributes = array('class' => 'form-inline', 'role' => 'form', 'method' => 'POST');
                echo form_open('visitors/review_changes', $attributes); 
            ?>
			<table class="table table-striped" id="main_table">
				<thead>
					<tr>
                        <th width="20%">
                            Full Name <a href="#" onclick="sortByFullName()"><i class="fas fa-sort"></i></a>
                        </th>
                        <th width="30%">Affected Fields</th>
                        <th width="30%">Reason for edit</th>
                        <th width="20%">Action</th>
					</tr>
				</thead>
				<tbody>
                    <?php 
                        foreach ($r_entries as $v): 
						
                            if (is_array($v)) { 
                            
                                //breakdown mod fields and exclude mod_reason
                            
                                $v['mod_fields'] = str_replace(',mod_reason,','',$v['mod_fields']);
                                
					?>
					<tr>
						<td>
                            <a href="<?php echo base_url('visitors/review_details').'/'.$v['mod_id']; ?>">
                            <span class="glyphicon glyphicon-file"></span> <?php echo strtoupper($v['lname'].', '.$v['fname']) ?>
                            </a>
						</td>
                        <td>
                            <?php 
                                echo $v['mod_fields'];
                            ?>
                        </td>
                        <td>
                            <?php 
                            echo $v['mod_reason'];
                            ?>
                        </td>
                        <td>
                            <input type="radio" name="action[<?php echo $v['mod_id'] ?>]" value="1" /> Approve
                            <input type="radio" name="action[<?php echo $v['mod_id'] ?>]" value="2" /> Deny
                            <input type="radio" name="action[<?php echo $v['mod_id'] ?>]" value="3" /> Ignore
                        </td>
					</tr>
					<?php 
						    }
                        endforeach;
					?>
				</tbody>
            </table>
            <?php
                echo '<input type="hidden" name="process_now" value="go" />';
                echo '<div style="text-align: center">';
                echo '<input type="submit" id="batch_process" class="form-control" value="Process entries &raquo;" />';
                echo '</div>';
                echo form_close();
            ?>
			<div class="page-links"><?php echo $links; ?></div>

			<?php } ?>

		</div>
	</div>
    <!--
    <div class="container-fluid">
		<small>
        <?php 
            $url = 'visitors/all_to_excel';
            if ($r_entries['result_count'] > 0) echo '<a href="'.$url.'" target="_blank"><i class="fas fa-file-excel"></i> Export to Excel &raquo;</a>';	
		?>
		</small>
	</div>
    -->
</div>

<script>
$(function () {

	$('#filter_by').on('change', function(){
		var myval = $(this).val();
		//alert(myval);
		
		switch (myval) {
			case 'nationality':
				$('#filter_by_nationality').show();
					$('#filter_by_nationality').prop('disabled', false);
				$('#filter_by_gender').hide();
					$('#filter_by_gender').prop('disabled', true);
				$('#filter_by_age_operand').hide();
					$('#filter_by_age_operand').prop('disabled', true);
				$('#filter_by_age_value').hide();
					$('#filter_by_age_value').prop('disabled', true);
				break;
			case 'gender':
				$('#filter_by_nationality').hide();
					$('#filter_by_nationality').prop('disabled', true);
				$('#filter_by_gender').show();
					$('#filter_by_gender').prop('disabled', false);
				$('#filter_by_age_operand').hide();
					$('#filter_by_age_operand').prop('disabled', true);
				$('#filter_by_age_value').hide();
					$('#filter_by_age_value').prop('disabled', true);
				break;
			case 'age':
				$('#filter_by_nationality').hide();
					$('#filter_by_nationality').prop('disabled', true);
				$('#filter_by_gender').hide();
					$('#filter_by_gender').prop('disabled', true);
				$('#filter_by_age_operand').show();
					$('#filter_by_age_operand').prop('disabled', false);
				$('#filter_by_age_value').show();
					$('#filter_by_age_value').prop('disabled', false);
				break;
			default:
			
		}

	});


	$('#filter_by_age_operand').on('change', function(){
		var myval = $(this).val();
		
		if (myval == 'between') {
			$('#filter_by_age_value').attr("placeholder", "18 and 25");
		}
		
	});

    $("#batch_process").click(function(event) {
		
		event.preventDefault();
		
		$.confirm({
			title: 'Confirm batch process action.',
			content: 'Are you sure?',
            type: 'red',
            animation: 'top',
			buttons: {
				confirm: function () {
                    $( "form:first" ).submit();
				},
				cancel: function () {
					//nothing
				}
			}

		});
        
	});
});		

//table sorting
function sortTable(table, order, nr) {
    var asc   = order === 'asc',
        tbody = table.find('tbody');
        
        tbody.find('tr').sort(function(a, b) {
            if (asc) {
                return $('td:nth-child('+ nr +')', a).text().localeCompare($('td:nth-child('+ nr +')', b).text());
            } else {
                return $('td:nth-child('+ nr +')', b).text().localeCompare($('td:nth-child('+ nr +')', a).text());
            }
        }).appendTo(tbody);
}

function sortByFullName() {
    sortTable($('#main_table'),'asc','1');  //it's the 1st column on the table
}

function sortByNationality() {
    sortTable($('#main_table'),'asc','4');  //it's the 4th column on the table
}

</script>