        </div>
	<script type='text/javascript'>
			$(function(){
				var my_main = new main();
					<?php foreach ($js_functions as $js_function): ?>
						my_main.<?php echo $js_function['name']; ?>();
					<?php endforeach; ?>
			});
		</script>
    </body>
</html>