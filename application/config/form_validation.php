<?php
$config = array(
			'products_edit' => array ( 
        		array('field' => 'product_name', 'label' => 'Название продукта', 'rules' => 'trim|required|xss_clean|_product_name_exists')
				),
            'recipes_add' => 
                array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required|xss_clean|_recipe_name_exists')
            );