<ul id="top_menu" class="span-24 dropdown">
    <li><?php echo anchor($this->linker->home_page_link(), 'Домой'); ?></li>
    <li><?php echo anchor($this->linker->a_products_show_link(), 'Продукты'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_products_add_link(), 'Добавить Продукт'); ?></li>
            <li><?php echo anchor($this->linker->a_products_show_link(), 'Список Продуктов'); ?></li>
        </ul>
    </li>
    <li><?php echo anchor($this->linker->a_product_categories_show_link(), 'Категории'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_product_categories_add_link(), 'Добавить Категорию'); ?></li>
            <li><?php echo anchor($this->linker->a_product_categories_show_link(), 'Список Категорий'); ?></li>
        </ul>
    </li>
    <li><?php echo anchor($this->linker->a_recipe_show_link(), 'Рецепты'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_recipe_add_link(), 'Добавить Рецепт'); ?></li>
            <li><?php echo anchor($this->linker->a_recipe_show_link(), 'Список Рецептов'); ?></li>
        </ul>
    </li>

    <li><?php echo anchor($this->linker->a_nutrition_categories_show_link(),'Вещества'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_nutrition_categories_add_link(), 'Добавить Вещество'); ?></li>
            <li><?php echo anchor($this->linker->a_nutrition_categories_show_link(), 'Список Веществ'); ?></li>
        </ul>
    </li>

	<li><?php echo anchor($this->linker->a_nutrition_show_link(), 'Сост. Веществ'); ?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_nutrition_add_link(), 'Добавить Сост. Вещества'); ?></li>
            <li><?php echo anchor($this->linker->a_nutrition_show_link(), 'Список Сост. Веществ'); ?></li>
		</ul>
	</li>
	   
    <li><?php echo anchor($this->linker->a_ratio_meras_edit_by_id_link(), 'Соотношение Величин'); ?></li>        
    <li><?php echo anchor($this->linker->a_translate_recipes_show_link(), 'Переводы'); ?></li>         
</ul>