<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Статус</th>
                <th>Название рецепта</th>                                            
                <th>URL</th>
                <th class="r_aligned">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recipes as $recipe):?>
            <tr>
                <td><?php echo $recipe->id;?></td>
                <td><?php echo $recipe->status;?></td>
                <td><?php echo $recipe->name;?></td>
                
                <td><a href="<?php echo 'http://'.$recipe->url;?>"><?php echo $recipe->url;?></a></td>
                <td class="r_aligned"><?php echo anchor('admin/translate_recipes/edit/'.$recipe->id, 'Редактировать', array('class' => 't_action'));?></td>
            <tr>
            <?php endforeach;?>                       
            </tr>
        </tbody>
    </table>
</div>