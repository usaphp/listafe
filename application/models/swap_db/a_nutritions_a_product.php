<?php
	class A_Nutritions_a_product extends DataMapper{
        var $table      = 'a_nutritions_a_products';
        var $has_one    = array('a_nutrition','a_product'); 
        var $has_many   = array();
            
        function __construct($id = NULL){
            parent::__construct($id);
        }
	}
?>