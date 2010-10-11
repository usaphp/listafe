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
            <?php foreach($categories as $category){ ?>
                <tr>
                    <td><?php echo $category->id; ?></td>
                    <td><?php echo $category->name; ?></td>
                    <td class="c_aligned">
                        <?php echo anchor('admin/categories/edit/'.$category->id, 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor('admin/categories/delete/'.$category->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>