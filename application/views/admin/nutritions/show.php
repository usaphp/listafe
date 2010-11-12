<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th class="r_aligned">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($nutritions as $nutrition): ?>
                <tr>
                    <td><?php echo $nutrition->id; ?></td>
                    <td><?php echo $nutrition->join_name; ?></td>
                    
                    <td><?php $curr_nutr_category = dm_get_object_by_id($nutrition->nutrition_category_id,$nutrition_categories);
                                if(isset($curr_nutr_category->join_name)) echo $curr_nutr_category->join_name ?></td>
                    <td class="r_aligned">
                        <?php echo anchor('admin/nutritions/edit/'.$nutrition->id, 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor('admin/nutritions/delete/'.$nutrition->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>