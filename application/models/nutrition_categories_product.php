<?php
class Nutrition_categories_Product extends DataMapper implements ArrayAccess{
    
    var $has_one = array('nutrition_category', 'product');
    var $has_many = array('nutrition');
    var $table = 'nutrition_categories_products';
    var $validation = array(
        'name' => array(
            'label' => 'Название категрии',
            'rules' => array('required', 'trim', 'unique')
        )
    );
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
        $iter = $this->getIterator();
    }

    public function offsetSet($key, $value) {
        
    }
    public function offsetUnset($key) {
        $this->del($key);
    }
    public function offsetGet($key) {
        return $this->get($key);
    }
    public function offsetExists($key) {
        
        return $this->exist($key);
    }

}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>