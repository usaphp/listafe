<table>
    <?php foreach($dm_products as $dm_product): ?>
    <tr>
        <td><?php echo $dm_product->id;?> </td>
        <td><?php echo $dm_product->join_name; ?></td>
        <td><img src="<?php echo image_url($dm_product->image, 'product', 'tiny'); ?>"/></td>
        <td class="c_aligned">
            <?php echo anchor('admin/products/edit/'.$dm_product->id, 'Редактировать', array('class' => 't_action'));?> 
            <?php echo anchor('admin/products/delete/'.$dm_product->id, 'Удалить', array('class' => 't_action'));?>
        </td>
    </tr>
    <?php endforeach;?>
</table>