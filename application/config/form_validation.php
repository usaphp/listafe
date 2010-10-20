<?php
$config = array(
			'products_edit' => array ( 
            		array('field' => 'product_name', 'label' => 'Название продукта', 'rules' => 'trim|required|xss_clean|_product_name_exists')
				)
			);
			
