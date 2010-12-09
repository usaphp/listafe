    <?php foreach($dm_products as $product): ?>
    	<div>
            <?php echo $product->id.' ';?>
            <?php echo $product->join_name;?>
        </div>
    <?php endforeach;?>