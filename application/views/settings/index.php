<div class="container">
	<h2><i class="fas fa-cog"></i>&nbsp; <?php echo $title; ?></h2>
	<p>&nbsp;</p>
    <div class="container-fluid text-right">
        &nbsp;
	</div>
	<p>&nbsp;</p>
    <div class="panel panel-default">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
                        <th width="2%">&nbsp;</th>
                        <th width="46%">Setting Name</th>
						<th width="46%">Setting Value</th>
                        <th width="2%">&nbsp;</th>
					</tr>
				</thead>
                <tbody>
                <?php
                    foreach ($settings as $s):
                ?>
                    <tr><td><a href="<?php echo site_url('settings/edit/'.$s['meta_id']); ?>"><i class="fas fa-file"></a></td>
                    <td><a href="<?php echo site_url('settings/edit/'.$s['meta_id']); ?>"><?php echo $s['meta_name'] ?></a></td>
                    <td><?php echo $s['meta_value'] ?></td>
                    <td><a href="<?php echo site_url('settings/edit/'.$s['meta_id']); ?>"><i class="fas fa-edit"></a></td></tr>
                <?php
                    endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>