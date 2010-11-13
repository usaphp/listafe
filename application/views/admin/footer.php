        </div>
        <!-- ONLINE LOAD LIBRARIES
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js"></script>
        -->
        <!-- OFFLINE LOAD LIBRARIES -->
        <script type="text/javascript" src="/js/offline/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="/js/offline/jquery.validate.js"></script>
        <script type="text/javascript" src="/js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="/js/jquery.form.js"></script>
        <script type="text/javascript" src="/js/jquery.fancybox-1.3.1.js"></script>
        <script type="text/javascript" src="/js/jquery.tooltip.js"></script>
        <script type="text/javascript" src="/js/autoresize.jquery.min.js"></script>
        <script type="text/javascript" src="/js/admin/main.js"></script>
		<script type='text/javascript'>
			$(function(){
				var my_main = new main();
				    main.base_url = '<?php echo $this->config->item('base_url'); ?>';
				    main.admin_url = '<?php echo $this->config->item('admin_url'); ?>';
					<?php foreach ($js_functions as $js_function): ?>
						my_main.<?php echo $js_function['name']; ?>();
					<?php endforeach; ?>
			});
		</script>
    </body>
</html>