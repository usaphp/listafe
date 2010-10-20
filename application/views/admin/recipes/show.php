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
                    <td><?php echo $recipe->recipes_image->id?><img src="<?php echo 1;#get_name_image($image->where('recipe_id',$recipe->id)->get(), 'recipe', 'tiny'); ?>"/></td>
                    <td class="r_aligned">
                        <?php echo anchor('admin/recipes/edit/'.$recipe->id, 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor('admin/recipes/delete/'.$recipe->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>