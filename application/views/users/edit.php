<div class="container">
	<h2><?php echo $title; ?></h2>
	<p><a href="javascript:history.go(-1)" ><span class="glyphicon glyphicon-remove-sign"></span> Cancel</a></p>
	<div class="panel panel-default">
		<div class="panel-body">
			<p class="small"><span class="text-info">*</span> Indicates a required field</p>
			<?php 
			echo '<div class="text-warning">';
			echo validation_errors();
			echo '</div>'; 

			if (isset($alert_success)) 
			{ 
			?>
				<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					User details updated.
				</div>
			<?php
			}
			
			if (isset($alert_fail))
			{
			?>
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $messages; ?>	
				</div>
			<?php
			}
			
				$attributes = array('class' => 'form-horizontal', 'role' => 'form');
				echo form_open('users/edit', $attributes); 
			?>
				<div class="form-group">
					<label class="control-label col-sm-2" for="username">Username<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="username" value="<?php echo $user['username'] ?>" disabled />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="password">Password<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="passconf">Confirm password<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="passconf" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="email">Email<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="email" value="<?php echo $user['email'] ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="firstname">First name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="firstname" value="<?php echo $user['first_name'] ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lastname">Last name<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="lastname" value="<?php echo $user['last_name'] ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="organization">Organization/Affiliation<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<input type="input" class="form-control" name="organization" value="<?php echo $user['company'] ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="user_status">User Status<span class="text-info">*</span></label>
					<div class="col-sm-10">
						<select name="user_status" id="user_status_input" class="form-control" >
							<option value="1" <?php if ($user['active'] == 1) echo 'selected'; ?> >Active</option>
							<option value="0" <?php if ($user['active'] == 0) echo 'selected'; ?>>Inactive</option>
						</select>
					</div>	
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="hidden" name="action" value="1" />						
						<input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>" />
						<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
