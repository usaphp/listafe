
        <!-- ONLINE LOAD LIBRARIES -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <!-- USED ON ADMIN ONLY I THINK <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script> -->

        <!-- OFFLINE LOAD LIBRARIES
        <script type="text/javascript" src="/js/offline/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="/js/offline/jquery.validate.js"></script>
         -->
        <!-- NOT USED I THINK <script type="text/javascript" src="/js/jquery.autocomplete.js"></script> -->
        <!-- ADMIN ONLY <script type="text/javascript" src="/js/jquery.form.js"></script>-->
        <!-- ADMIN ONLY DONT KNOW <script type="text/javascript" src="/js/jquery.fancybox-1.3.1.js"></script>-->
        <script type="text/javascript" src="/js/jquery.address-1.3.1.min.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
<!-- Our JS functions that are being set in controller -->
		<script type='text/javascript'>
			$(function(){
    			var my_main = new main();
				<?php foreach($js_functions as $js_function): ?>
					my_main.<?php echo $js_function['name']; ?>();
				<?php endforeach; ?>
			});
		</script>
    </body>
</html>