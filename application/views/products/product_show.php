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
    ); 
    $sel_products = array(
        'options'   => array_for_dropbox($dm_products,'Products selected category','id','name'),
        'name'      => 'product_selected_name',
        'selected'  => $dm_product_selected->id,
        'id'        => 'product_selected_id',
        'class'     => ''
    );
    $sel_mera = array(
        'options'   => $meras_available,
        'name'      => 'mera_selected_name',
        'selected'  => '',
        'id'        => 'mera_selected_id',
        'class'     => ''
        
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
            <?php $this->load->view('shared/main_search');?>
		</div>
        <div>
            <?php $this->load->view('header/crumbs',array('crumbs'=>$crumbs))?></div>
        <div>
        <?php 
            echo form_open($this->linker->home_product_show($dm_product_selected->id));
            echo form_dropdown($sel_products['name'], $sel_products['options'], $sel_products['selected'], 'id = "'.$sel_products['id'].'" class = "'.$sel_products['class'].'"');
            echo form_dropdown($sel_mera['name'], $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');
            echo form_close(); 
        ?>
        </div>
        <div id="block_nutrition_facts">
            <?php $this->load->view('shared/nutrition_facts'); ?>
        </div>
        <div id="block_nutrition_tables">
            
            <?php $this->load->view('products/nutrition_tables'); ?>
        </div>
		<div id='search_results_holder' style='display:none'></div>
	</div>
	<div class='span-4 last'>&nbsp;</div>
</div>