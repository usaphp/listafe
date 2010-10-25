<?php 
class Mapper {
    
    private $db;
    
    public function __construct() {
        $this->CI = & get_instance();
        $this->db = $this->CI->db;
    }
    
    public function load_data($parent, $child, $join_table) {
        # Sozdaem objekti klassov
        $parent_class = new $parent();
        $child_class = new $child();
        
        # Nazvanie modeli s malenkimi bukvami : naprimer "product" dlya modeli "Product" tablici "products"
        $parent_singular = strtolower($parent);
        $child_singular = strtolower($child);
        
        # Nazvanie tablici : naprimer "products"
        $parent_table = strtolower(plural($parent));
        $child_table = strtolower(plural($child));
        
        $select_arr = array();
        # Vibiraem vse zapisi iz glavnoi tablici
        $select_string = $parent_table.'.*';
        array_push($select_arr, $select_string);
        # Esli peredana join table to i ee vkluchaem toze
        if($join_table) $select_string = $join_table.'.*';
        array_push($select_arr, $select_string);
        
        # Cikl po vsem polyam vtoroi tablici chtobi dobavit im prefix : naprimer "nutrition_category_name" chtobi ne putat s "product->name"
        foreach($child_class->fields as $field){
            $select_string = $child_table.'.'.$field.' as '.$child_table.'_'.$field;
            array_push($select_arr, $select_string);
        }
        # Sobiraem vsiu stroky dlya selecta
        $select_string = implode(', ', $select_arr);
        
        $this->db->select($select_string);
        $this->db->from($parent_table);
        
        $join_on = $parent_table.'.id = '.$join_table.'.'.$parent_singular.'_id';
        $this->db->join($join_table, $join_on);
        
        $join_on = $child_table.'.id = '.$join_table.'.'.$child_singular.'_id';
        $this->db->join($child_table, $join_on);
        
        $data = $this->db->get()->result();
        print_flex($data);
    }
    
}