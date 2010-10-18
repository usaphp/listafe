<?php
class Product extends DataMapper {
    
    var $has_one = array('category', 'mera');
    var $has_many = array('recipe'); 
    
    var $validation = array(
        'name' => array(
            'label' => 'Название продукта',
            'rules' => array('required', 'trim', 'unique')
        ),
        'calories' => array(
            'label' => 'Калорий',
            'rules' => array('required')
        ),
        'protein' => array(
            'label' => 'Белок',
            'rules' => array('required')
        ),
        'fat' => array(
            'label' => 'Жир',
            'rules' => array('required')
        ),
        'carbo' => array(
            'label' => 'Углеводы',
            'rules' => array('required')
        ),
        'mera_id' => array(
            'label' => 'Мера измерения',
            'rules' => array('required')
        )
    );
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}

/* End of file name.php */
/* Location: ./application/models/product.php */
?>