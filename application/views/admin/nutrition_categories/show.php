<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th class="r_aligned">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($nutrition_categories as $nutrition_category){ ?>
                <tr>
                    <td><?php echo $nutrition_category->id; ?></td>
                    <td><?php echo $nutrition_category->join_name; ?></td>
                    <td class="r_aligned">
                        <?php echo anchor('admin/nutrition_categories/edit/'.$nutrition_category->id, 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor('admin/nutrition_categories/delete/'.$nutrition_category->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>