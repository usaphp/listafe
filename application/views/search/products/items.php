<ul class='search_results'>
<?php foreach($dm_products as $product): ?>
	<li class="search_results_item">		
        <?php echo anchor($this->linker->product_link($product), $product->join_name, array('class' => 'mp_sr_title')); ?>        

        <div><?php echo dm_get_value_by_field('Energy Kcal',$product->nutrition,'join_name')?> Calories</div>
        <div>
            <span>Fat: <?php echo dm_get_value_by_field('Total lipid (fat)',$product->nutrition,'join_name')?></span>
            <span>Carbohidrate: <?php echo dm_get_value_by_field('Carbohydrate, by difference',$product->nutrition,'join_name')?></span>
            <span>Protein: <?php echo dm_get_value_by_field('Protein',$product->nutrition,'join_name')?></span>
        </div>
        <div>
            <span>weight loss</span>
            <span>high in Vitamins</span>
        </div>
        <div>+</div>
        <div>-</div>
        <?php $this->load->view('search/nutritions/items',array('dm_nutritions'=>$product->nutrition));?>
    </li>
<?php endforeach;?>
</ul>