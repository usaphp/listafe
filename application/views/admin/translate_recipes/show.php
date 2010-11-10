<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Статус</th>
                <th>Название рецепта</th>
                <th class="r_aligned">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recipes as $recipe):?>
            <tr>
                <td><?php echo $recipe->id;?></td>
                <td><div class='recipe_translate_status_<?php echo $recipe->status;?>'></div></td>
                <td><?php echo $recipe->name;?></td>
                <td class="r_aligned">
                	<?php echo anchor('admin/translate_recipes/edit/'.$recipe->id, 'Редактировать', array('class' => 't_action'));?>
                	<?php echo anchor($recipe->url, 'Оригинал', array('class' => 't_action', 'target' => '_blank'));?>
                </td>
            <tr>
            <?php endforeach;?>                       
            </tr>
        </tbody>
    </table>
</div>