<?php
        $config = array(
			'products_edit' => array ( 
        		array('field' => 'inp_name_1', 'label' => 'Название продукта','rules' => 'trim|required')),
            'recipe_add' => 
                array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required'),
            'recipe_edit' =>
                array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required'),
            'product_prices' =>
                array('field' => 'product_name', 'label' => 'Название Продукта', 'rules' => 'trim|required|xss_clean'),            
            'translate_recipe' =>
                array('field' => 'text_translate', 'label' => 'Перевод', 'rules' => 'trim|required|xss_clean'),
            'product_meras' =>
                array('rules' => 'trim|required|xss_clean'),
            'nutrition' =>
                array('field' => 'nutrition_name', 'label' => 'Название Вещества', 'rules' => 'trim|required|xss_clean'),
            'nutrition_category' =>
                array('field' => 'inp_name', 'label' => 'Название Категории', 'rules' => 'trim|required'),
            'product_category' =>
                array('field' => 'category_name', 'label' => 'Название Категории', 'rules' => 'trim|required')                        
        );  
?>