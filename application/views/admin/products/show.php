<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <?php /*
                foreach($nutrition_categories as $nc){
                    echo '<th>'.$nc->name.'</th>';    
                }*/
                ?>
                <th>Единицы Измения</th>
                <th>Фото</th>
                <th class="c_aligned">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product){ ?>
                <tr>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo $product->join_name; ?></td>
                    <td><?php echo dm_get_object_by_id($product->product_category_id,$products->product_category)->join_name; ?></td>                    
                    <td><?php echo dm_get_object_by_id($product->mera_id,$products->mera)->join_name; ?></td>
                    <td><img src="<?php echo image_url($product->image, 'product', 'tiny'); ?>"/></td>
                    <td class="c_aligned">
                        <?php echo anchor('admin/products/edit/'.$product->id, 'Редактировать', array('class' => 't_action'));?> 
                        <?php echo anchor('admin/products/delete/'.$product->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>