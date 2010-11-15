<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th class="c_aligned">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($product_categories as $category){ ?>
                <tr>
                    <td><?php echo $category->id; ?></td>
                    <td><?php echo $category->join_name; ?></td>
                    <td class="c_aligned">
                        <?php echo anchor('admin/product_categories/edit/'.$category->id, 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor('admin/product_categories/delete/'.$category->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>