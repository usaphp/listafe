<?php $this->load->view('/admin/header'); ?>
<?php
$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'size'	=> 30,
    'class' => 'f_input wide',
	'value' => set_value('username')
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
    'class' => 'f_input wide',
	'size'	=> 30
);

$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0'
);

$confirmation_code = array(
	'name'	=> 'captcha',
    'class' => 'f_input',
	'id'	=> 'captcha',
	'maxlength'	=> 8
);

?>
<div class="span-10 prepend-7 append-7">
<?php echo form_open($this->dx_auth->admin_login_uri, array('id' => 'login_form'))?>
    <div id="login_logo"></div>
    <div class="f_header">Login</div>
    <div class="f_content">
        <?php if($this->dx_auth->get_auth_error()): ?>
        <div class="f_error_top"><?php echo $this->dx_auth->get_auth_error(); ?></div>
        <?php endif; ?>
        <?php echo form_label('Username', $username['id'], array('class' => 'f_label'));?>
		<?php echo form_input($username)?>
        <?php echo form_error($username['name']); ?>
        <?php echo form_label('Password', $password['id'], array('class' => 'f_label'));?>
		<?php echo form_password($password)?>
        <?php echo form_error($password['name']); ?>

        <?php if ($show_captcha): ?>
            Enter the code exactly as it appears. There is no zero.
            <?php echo $this->dx_auth->get_captcha_image(); ?>
            <?php echo form_label('Confirmation Code', $confirmation_code['id']);?>
    		<?php echo form_input($confirmation_code);?>
    		<?php echo form_error($confirmation_code['name']); ?>
        <?php endif; ?>
        <div class="f_checkbox_under_w">
		<?php echo form_checkbox($remember);?> <?php echo form_label('Remember me', $remember['id']);?>
        </div> 
		<?php
			if ($this->dx_auth->admin_allow_registration) {
				echo anchor($this->dx_auth->register_uri, 'Register');
			};
		?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('login','Login');?>
    </div>
  <?php echo form_close()?>
</div>
<?php $this->load->view('/admin/footer'); ?>