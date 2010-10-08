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
            <?php foreach($nutritions_categories as $nutrition_category){ ?>
                <tr>
                    <td><?php echo $nutrition_category->id; ?></td>
                    <td><?php echo $nutrition_category->name; ?></td>
                    <td class="c_aligned">
                        <?php echo anchor('admin/nutritions_categories/edit/'.$nutrition_category->id, 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor('admin/nutritions_categories/delete/'.$nutrition_category->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>