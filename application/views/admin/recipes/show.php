<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Подготовка</th>
                <th>Приготовление</th>
                <th>Порции</th>
                <th>Фото</th>
                <th class="r_aligned">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recipes as $recipe){?>
                <tr>
                    <td><?php echo $recipe->id; ?></td>
                    <td><?php echo $recipe->name; ?></td>
                    <td><?php echo $recipe->prepare_time; ?></td>
                    <td><?php echo $recipe->cook_time; ?></td>
                    <td><?php echo $recipe->servings; ?></td>
                    <td><img src="<?php echo get_name_image($recipe->id, $recipe->recipes_image_id, 'tiny'); ?>"/></td>
                    <td class="r_aligned">
                        <?php echo anchor($this->linker->a_recipe_edit_by_id_link($recipe->id), 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor($this->linker->a_recipe_delete_by_id_link($recipe->id), 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>