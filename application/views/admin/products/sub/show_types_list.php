<table>
    <?php foreach($dm_product_types as $product_type): ?>
    <tr>
        <td><?php echo $product_type->id; ?></td>        
        <td><?php echo $product_type->join_name.' '.anchor('#', '+', array('id' => 'product_type_'.$product_type->id, 'class' => 'load_products t_action')); ?></td>
    </tr>
    <tr>
        <td colspan="2" id="products_holder_<?php echo $product_type->id; ?>"></td>
    </tr>
    <?php endforeach;?>
</table>