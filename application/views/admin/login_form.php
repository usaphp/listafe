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
<?php echo form_open($this->linker->a_login_link(), array('id' => 'login_form'))?>
    <div id="login_logo"></div>
    <div class="f_header">Login</div>
    <div class="f_content">
        <?php echo form_label('Username', $username['id'], array('class' => 'f_label'));?>
		<?php echo form_input($username)?>
        <?php echo form_error($username['name']); ?>
        <?php echo form_label('Password', $password['id'], array('class' => 'f_label'));?>
		<?php echo form_password($password)?>
        <?php echo form_error($password['name']); ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('login','Login');?>
    </div>
  <?php echo form_close()?>
</div>
<?php $this->load->view('/admin/footer'); ?>