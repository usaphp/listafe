<?php $this->load->view('/admin/header'); ?>
<?php top_success_error($this->top_error, $this->top_success); ?>
<?php echo $contents; ?>
<?php $this->load->view('/admin/footer_info'); ?>
<?php $this->load->view('/admin/footer'); ?>