<?php
$config = array('products/edit' => array ( 
            array('field' => 'product_name', 'label' => 'Название продукта', 'rules' => 'trim|required|xss_clean|_product_name_exists'),
            array('field' => 'price', 'label' => 'Цена', 'rules' => 'required|number'),
            array('field' => 'units_for_price', 'label' => 'Цена за единиц', 'rules' => 'required|number'),
            array('field' => 'units_mera_id', 'label' => 'Мера измерения', 'rules' => 'required|number'),
            array('field' => 'calories', 'label' => 'Калорий', 'rules' => 'required|integer')
			),
            'recipes_add' => 
                array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required|xss_clean|_recipe_name_exists'));
            
            
			
