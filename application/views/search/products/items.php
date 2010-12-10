<ul class='search_results'>
<?php foreach($dm_products as $product): ?>
	<li>
		<?php echo anchor($this->linker->product_link($product), $product->join_name, array('class' => 'mp_sr_title')); ?>
    </li>
<?php endforeach;?>
</ul>