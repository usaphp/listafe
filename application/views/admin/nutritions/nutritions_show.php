<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th class="c_aligned">Действие</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($nutritions as $nutrition): ?>
                <tr>
                    <td><?php echo $nutrition->id; ?></td>
                    <td><?php echo $nutrition->name; ?></td>
                    <td><?php echo $nutrition->category_id; ?></td>
                    <td class="c_aligned">
                        <?php echo anchor('admin/nutritions/edit/'.$nutrition->id, 'Редактировать', array('class' => 't_action'));?>
                        <?php echo anchor('admin/nutritions/delete/'.$nutrition->id, 'Удалить', array('class' => 't_action'));?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>