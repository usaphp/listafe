<ul class='search_results'>
<?php foreach($dm_products as $product): 
	$max_nutrition = max($product->nutrition->data->fat['value'], $product->nutrition->data->carbo['value'], $product->nutrition->data->protein['value']);
?>
	<li class="search_results_item">		
        <h3 class='mp_sr_title'><?php echo anchor($this->linker->product_link($product), $product->name); ?></h3>        
		
        <div class='mp_sr_calories'><span><?php echo round($product->nutrition->data->energ_kcal['value']); ?></span> Calories</div>
        <div class='mp_sr_main_nutr_wrapper'>
	        <div class='mp_sr_main_nutr'>
	            Fat: <span class='<?php echo ($product->nutrition->data->fat['value'] == $max_nutrition)?'green':'red'; ?>'><?php echo $product->nutrition->data->fat['value']; ?></span>
			</div>
	        <div class='mp_sr_main_nutr'>
	            Carbohidrate: <span class='<?php echo ($product->nutrition->data->carbo['value'] == $max_nutrition)?'green':'red'; ?>'><?php echo $product->nutrition->data->carbo['value']; ?></span>
			</div>
	        <div class='mp_sr_main_nutr'>
	            Protein: <span class='<?php echo ($product->nutrition->data->protein['value'] == $max_nutrition)?'green':'red'; ?>'><?php echo $product->nutrition->data->protein['value']; ?></span>
	        </div>
	        <div class='clear'></div>
		</div>
        <?php $this->load->view('shared/nutrition_facts',array('dm_nutritions'=>$product->nutrition));?>
    </li>
<?php endforeach;?>
</ul>