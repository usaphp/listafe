<?php
class A_Language extends DataMapper {
    var $table    = 'a_languages';
    var $has_many = array('a_product_category','a_product','a_nutrition_category','a_nutrition','a_mera','a_product_type');
            
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>