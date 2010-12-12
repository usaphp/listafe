<?php        
    
    $inp_product_name = array(
    	'id'	=> 'product_type_id',
    	'name'	=> 'product_type_name',
    	'class'	=> 'main_search_input',
    	'value' => ''
     ); #
     $btn_search = array(
     	'type'	=> 'image',
     	'src'	=> '/images/buttons/search_button.png',
    	'id'	=> 'search_button_id',
    	'name'	=> 'search_bytton_name',
    	'class'	=> 'main_search_button',
    	'value' => 'search',
    	'content' => 'search'
    ); #value-onalogi4no name
?>
<div class='container'>
    <div class="span-24 mp_big_logo">
    	<img src='/images/site/big_logo.png' alt='Listafe.com'/>
    </div>
    <div class='span-4'>&nbsp;
    	<div class='left_hider' style='display:none'>
    		<a href='<?php echo base_url(); ?>'><img src='/images/site/small_logo.png' alt='Listafe.com' /></a>
    	</div>
    </div>
    <div class='span-16'>
	    <div class="mp_search_wrapper">
	    <?php echo form_open( base_url(), array('id' => 'main_search_form', 'class' => '', 'autocomplete' => 'off'));?>
	        <?php 
	            echo form_label('Food Name', $inp_product_name['id'], array('class' => 'main_search_label'));
				?>
				<div class='mp_input_wrapper'>
					<?php
		        	echo form_input($inp_product_name);
		            echo form_input($btn_search);
		        	?>
		        	<div class="clear"></div>
	        	</div>
				<ul id='search_suggest' style='display:none;'></ul>
		<?php echo form_close(); ?>
		</div>
		<div id='search_results_holder' style='display:none'></div>
	</div>
	<div class='span-4 last'>&nbsp;</div>
</div>