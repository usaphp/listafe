<ul id="top_menu" class="span-24 dropdown">
    <li><?php echo anchor('', 'Домой'); ?></li>
    <li><?php echo anchor('admin/products/show', 'Продукты'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/products/edit/', 'Добавить Продукт'); ?></li>
            <li><?php echo anchor('admin/products/show', 'Список Продуктов'); ?></li>
        </ul>
    </li>
    <li><?php echo anchor('admin/categories/show', 'Категории'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/categories/edit', 'Добавить Категорию'); ?></li>
            <li><?php echo anchor('admin/categories/show', 'Список Категорий'); ?></li>
        </ul>
    </li>
    <li><?php echo anchor('admin/reciepts/show', 'Рецепты'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/recipes/add', 'Добавить Рецепт'); ?></li>
            <li><?php echo anchor('admin/recipes/show', 'Список Рецептов'); ?></li>
        </ul>
    </li>

	<li><?php echo anchor('admin/nutritions/show', 'Ингридиенты'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/nutritions/edit', 'Добавить ингридиент'); ?></li>
            <li><?php echo anchor('admin/nutritions/show', 'Список ингридиентов'); ?></li>
		</ul>
	</li>

    <li><?php echo anchor('admin/nutritions_categories/show', 'Составляющие'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/nutritions_categories/add', 'Добавить Составляющие'); ?></li>
            <li><?php echo anchor('admin/nutritions_categories/show', 'Список Составляющих'); ?></li>
        </ul>
    </li>
</ul>