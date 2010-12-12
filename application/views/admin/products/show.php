<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Категория</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dm_product_categories as $product_category){ ?>
                <tr>
                    <td><?php echo $product_category->id; ?></td>                    
                    <td><?php echo $product_category->join_name.' '.anchor('#', '+', array('id' => 'product_category_'.$product_category->id, 'class' => 'load_product_types t_action')); ?></td>
                </tr>
                <tr>
                    <td colspan="2" id="product_types_holder_<?php echo $product_category->id; ?>"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>