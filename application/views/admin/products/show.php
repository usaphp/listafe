<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Калорий</th>
                <th>Белки</th>
                <th>Жиры</th>
                <th>Углеводы</th>
                <th>Единицы Измения</th>
                <th>Фото</th>
                <th class="c_aligned">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product){ ?>
                <tr>
                    <td><?php echo $product->id; ?></td>
                    <td><?php echo $product->name; ?></td>
                    <td><?php echo $product->category_name; ?></td>
                    <td><?php echo $product->calories; ?></td>
                    <td><?php echo $product->protein; ?></td>
                    <td><?php echo $product->fat; ?></td>
                    <td><?php echo $product->carbo; ?></td>
                    <td><?php echo $product->default_mera_name; ?></td>
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