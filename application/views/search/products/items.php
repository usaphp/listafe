<ul class='search_results'>
<?php foreach($dm_products as $product): 
	$product->main_data->fat = dm_get_value_by_field('Total lipid (fat)',$product->nutrition,'join_name');
	$product->main_data->carbo = dm_get_value_by_field('Carbohydrate, by difference',$product->nutrition,'join_name');
	$product->main_data->protein = dm_get_value_by_field('Protein',$product->nutrition,'join_name');
	$max_nutrition = max($product->main_data->fat, $product->main_data->carbo, $product->main_data->protein);
?>
	<li class="search_results_item">		
        <h3 class='mp_sr_title'><?php echo anchor($this->linker->product_link($product), $product->join_name); ?></h3>        
		
        <div class='mp_sr_calories'><span><?php echo round(dm_get_value_by_field('Energy Kcal',$product->nutrition,'join_name')); ?></span> Calories</div>
        <div class='mp_sr_main_nutr_wrapper'>
	        <div class='mp_sr_main_nutr'>
	            Fat: <span class='<?php echo ($product->main_data->fat == $max_nutrition)?'green':'red'; ?>'><?php echo $product->main_data->fat; ?></span>
			</div>
	        <div class='mp_sr_main_nutr'>
	            Carbohidrate: <span class='<?php echo ($product->main_data->carbo == $max_nutrition)?'green':'red'; ?>'><?php echo $product->main_data->carbo; ?></span>
			</div>
	        <div class='mp_sr_main_nutr'>
	            Protein: <span class='<?php echo ($product->main_data->protein == $max_nutrition)?'green':'red'; ?>'><?php echo $product->main_data->protein; ?></span>
	        </div>
	        <div class='clear'></div>
		</div>
        <?php $this->load->view('search/nutritions/items',array('dm_nutritions'=>$product->nutrition));?>
    </li>
<?php endforeach;?>
</ul>