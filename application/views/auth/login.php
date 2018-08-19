<?php include_once('templates/header.php') ?>

    <div class="row" id="logos-prime">
        <div class="col-sm-6"><img src="<?php echo base_url('/images/donsol_seal.png') ?>" alt="donsol_seal" /></div>
        <div class="col-sm-6" style="text-align: right"><img src="<?php echo base_url('/images/wwf_logo.png') ?>" alt="wwf_logo" /></div>
    </div>
    <div class="row" id="logos-alt">
        <div class="col-sm-12" style="text-align: center">
            <img src="<?php echo base_url('/images/donsol_seal.png') ?>" alt="donsol_seal" />
             <img src="<?php echo base_url('/images/wwf_logo.png') ?>" alt="wwf_logo" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1>Donsol Tourism Information System</h1>
            <p>This is the Tourism Information System for the <strong>Municipality of Donsol, Sorsogon</strong>.<br />
            Please log in with your credentials to access.</p>
            <h2>Login</h2>
            <hr />

            <div id="infoMessage"><?php echo $message;?></div>

            <?php 
                $attributes = array('class' => 'form-inline', 'role' => 'form');	
                echo form_open("auth/login", $attributes);
            ?>

                <div class="form-group">
                <?php $attrib_input = array('class' => 'form-control'); ?>
                <?php echo lang('login_identity_label', 'identity');?>
                <?php echo form_input($identity, '', $attrib_input);?>
                </div>

                <div class="form-group">
                <?php echo lang('login_password_label', 'password');?>
                <?php echo form_input($password, '', $attrib_input);?>
                </div>
                <!--
                <div class="form-group">
                <?php echo lang('login_remember_label', 'remember');?>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                </div>
                -->
                <div class="form-group">
                <?php $attrib_btn = array('class' => 'btn btn-default'); ?>
                <?php echo form_submit('submit', lang('login_submit_btn'), $attrib_btn);?>
                </div>

            <?php echo form_close();?>
            <br />
            <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

            <p style="margin-top: 80px; text-align: right">
                Development of this system has been facilitated by the <a href="http://wwf.org.ph/" target="_blank">WWF-Philippines</a>, through its Sustainable 
                Whaleshark Ecotourism Program. 
            </p>
            <?php include_once('templates/footer.php') ?>
        </div> 
    </div>
    <p style="color: #FFFFFF">tester123</p>