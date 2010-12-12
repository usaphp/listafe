<?php        
    #$link_to_homepage = $this->linker->home_product_categories($dm_product_category_selected->join_name);
    if(isset($dm_product_category_selected))
        $link_to_homepage = $this->linker->home_product_type($dm_product_category_selected->join_name, $dm_product_type_selected->join_name, $dm_product_type_selected->id);  
    if(isset($dm_product_type_selected))        
        $link_to_homepage = $this->linker->home_products_by_type($dm_product_category_selected->join_name, $dm_product_type_selected->join_name,$dm_product_type_selected->id);    
    if(isset($dm_product_selected))
        $link_to_homepage = $this->linker->home_product_show($dm_product_selected->join_name, $dm_product_selected->id);
    
    if(!isset($link_to_homepage))
        $link_to_homepage = $this->linker->home_page_link();
        
    $sel_category = array(
		'options' => array_for_dropbox($dm_product_categories,'Категории','id','join_name'),
		'name'    => 'prodcut_categories_name',
		'id'      => 'product_categories_id',
		'class'   => 'f_select',
		'selected'=> ''
    );
    $inp_product_name = array(
    	'id'	=> 'product_type_id',
    	'name'	=> 'product_type_name',
    	'class'	=> 'f_input f_joined suggest_product_type',
    	'value' => ''
     ); #
     $btn_search = array(
    	'id'	=> 'search_button_id',
    	'name'	=> 'search_bytton_name',
    	'class'	=> 'f_button tiny f_last',
    	'value' => 'Search'
    ); #value-onalogi4no name
?>
    <div class="span-24 content">
    <div class="f_header">Поиск продукта</div>
    <?php echo form_open($link_to_homepage, array('class' => 'f_form'));?>
    <div class="f_content">
        <div class="f_joined">
            <?php
            echo form_label('Food Group', $inp_product_name['id'], array('class' => 'f_label'));
            echo form_dropdown($sel_category['name'], $sel_category['options'], $sel_category['selected'], 'id = "'.$sel_category['id'].'" class = "'.$sel_category['class'].'"');
            ?>
        </div>
        <div class="f_joined">
            <?php
            echo form_label('Food Name', $inp_product_name['id'], array('class' => 'f_label'));
        	echo form_input($inp_product_name);
            ?>
        </div>
        <div class="f_buttons">
            <?php echo form_submit($btn_search);?>
        </div>
        <div class="clear"></div>
<?php echo form_close(); ?>
</div>