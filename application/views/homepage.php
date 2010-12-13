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
    $sel_products = array(
        'name'      => 'product_name',
        'options'   => array_for_dropbox($dm_products,'Products selected category','id','join_name'),
        'selected'  => '',
        'id'        => '',
        'class'     => ''
    );
    $sel_mera = array(
        'options'   => $meras_available,
        'name'      => 'mera_id',
        'id'        => 'mera_id',
        'class'     => '',
        'selected'  => '0'
    );
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
        <div><?php $this->load->view('header/crumbs',array('crumbs'=>$crumbs))?></div>
        <div>
        <?php 
            echo form_open($this->linker->home_product_show($dm_product_selected->id));
            echo form_dropdown($sel_products['name'], $sel_products['options'], $sel_products['selected'], 'id = "'.$sel_products['id'].'" class = "'.$sel_products['class'].'"');
            echo form_dropdown($sel_mera['name'], $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');
            echo form_close(); 
        ?>
        </div>
        <div>
            <?php $this->load->view('shared/nutritions/nutrition_facts',array('dm_nutritions' => $dm_product_selected->nutrition));?>
        </div>
		<div id='search_results_holder' style='display:none'></div>
	</div>
	<div class='span-4 last'>&nbsp;</div>
</div>