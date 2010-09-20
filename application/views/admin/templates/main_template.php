<?php $this->load->view('/admin/header'); ?>
<script type="text/javascript">
    imain = new main();
    imain.base_url = '<?php echo $this->config->item('base_url'); ?>';
    imain.admin_url = '<?php echo $this->config->item('admin_url'); ?>';
</script>
<?php top_success_error($this->top_error, $this->top_success); ?>
<?php $this->load->view('/admin/top_bar'); ?>
<?php $this->load->view('/admin/top_menu'); ?>
<?php echo $contents; ?>
<?php $this->load->view('/admin/footer_info'); ?>
<script type="text/javascript">
    imain.tabs_init();
    imain.dropdown_init();
</script>
<?php $this->load->view('/admin/footer'); ?>