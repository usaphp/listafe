<ul id="top_menu" class="span-24 dropdown">
    <li><?php echo anchor('', 'Домой'); ?></li>
    <li><?php echo anchor('admin/products/show', 'Продукты'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/products/edit/', 'Добавить Продукт'); ?></li>
            <li><?php echo anchor('admin/products/show', 'Список Продуктов'); ?></li>
        </ul>
    </li>
    <li><?php echo anchor('admin/product_categories/show', 'Категории'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/product_categories/edit', 'Добавить Категорию'); ?></li>
            <li><?php echo anchor('admin/product_categories/show', 'Список Категорий'); ?></li>
        </ul>
    </li>
    <li><?php echo anchor('admin/recipes/show', 'Рецепты'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/recipes/add', 'Добавить Рецепт'); ?></li>
            <li><?php echo anchor('admin/recipes/edit', 'Редактировать Рецепт'); ?></li>
            <li><?php echo anchor('admin/recipes/show', 'Список Рецептов'); ?></li>
        </ul>
    </li>

    <li><?php echo anchor('admin/nutrition_categories/show', 'Вещества'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/nutrition_categories/edit', 'Добавить Вещество'); ?></li>
            <li><?php echo anchor('admin/nutrition_categories/show', 'Список Веществ'); ?></li>
        </ul>
    </li>

	<li><?php echo anchor('admin/nutritions/show', 'Сост. Веществ'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor('admin/nutritions/edit', 'Добавить Сост. Вещества'); ?></li>
            <li><?php echo anchor('admin/nutritions/show', 'Список Сост. Веществ'); ?></li>
		</ul>
	</li>
</ul>