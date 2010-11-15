<?php
$config = array(
			'products_edit' => array ( 
        		array('field' => 'product_name', 'label' => 'Название продукта', 'rules' => 'trim|required|xss_clean|_product_name_exists')),
            'recipe_add' => 
                array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required|xss_clean|_recipe_name_exists'),
            'recipe_edit' =>
                array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required|'),
            'product_prices' =>
                array('field' => 'product_name', 'label' => 'Название Продукта', 'rules' => 'trim|required|xss_clean'),            
            'translate_recipe' =>
                array('field' => 'text_translate', 'label' => 'Перевод', 'rules' => 'trim|required|xss_clean'),
            'product_meras' =>
                array('rules' => 'trim|required|xss_clean'),
            'nutrition' =>
                array('field' => 'nutrition_name', 'label' => 'Название Вещества', 'rules' => 'trim|required|xss_clean'),
            'nutrition_category' =>
                array('field' => 'nutrition_categories_name', 'label' => 'Название Категории', 'rules' => 'trim|required'),
            'product_category' =>
                array('field' => 'category_name', 'label' => 'Название Категории', 'rules' => 'trim|required')                        
);  
?>