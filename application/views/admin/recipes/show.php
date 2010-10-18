<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Подготовка</th>
                <th>Приготовление</th>
                <th>Порции</th>
                <th class="r_aligned">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recipes as $recipe){ ?>
                <tr>
                    <td><?php echo $recipe->id; ?></td>
                    <td><?php echo $recipe->name; ?></td>
                    <td><?php echo $recipe->prepare_time; ?></td>
                    <td><?php echo $recipe->cook_time; ?></td>
                    <td><?php echo $recipe->servings; ?></td>
                    <td class="r_aligned">
                        <?php echo anchor('admin/nutrition_categories/edit/'.$recipe->id, 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor('admin/nutrition_categories/delete/'.$recipe->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>