<?php 
class Mapper {
    
    private $db;
    
    public function __construct() {
        $this->CI = & get_instance();
        $this->db = $this->CI->db;
    }
    
    public function load_data($parent, $child, $join) {
        # Sozdaem objekti klassov
        $parent_class = new $parent();
        $child_class = new $child();
        $join_class = new $join;
        
        # Nazvanie modeli s malenkimi bukvami : naprimer "product" dlya modeli "Product" tablici "products"
        $parent_singular = strtolower($parent);
        $child_singular = strtolower($child);
        $join_singular = strtolower($join);
        
        # Nazvanie tablici : naprimer "products"
        $parent_table = strtolower(plural($parent));
        $child_table = strtolower(plural($child));
        $join_table = strtolower(plural($join));
        
        $select_arr = array();
        # Vibiraem vse zapisi iz glavnoi tablici
        $select_string = $parent_table.'.*';
        array_push($select_arr, $select_string);
        
        # Cikl po vsem polyam vtoroi tablici chtobi dobavit im prefix : naprimer "nutrition_category_name" chtobi ne putat s "product->name"
        foreach($child_class->fields as $field){
            $select_string = $child_table.'.'.$field.' as '.$child_singular.'_'.$field;
            array_push($select_arr, $select_string);
        }
        
        # Esli model dlya join tablici sushestvuet
        foreach($join_class->fields as $field){
            $select_string = $join_table.'.'.$field.' as '.$join_singular.'_'.$field;
            array_push($select_arr, $select_string);
        }
        # Sobiraem vsiu stroky dlya selecta
        $select_string = implode(', ', $select_arr);
        
        $this->db->select($select_string);
        $this->db->from($parent_table);
        
        $join_on = $parent_table.'.id = '.$join_table.'.'.$parent_singular.'_id';
        $this->db->join($join_table, $join_on, 'left');
        
        $join_on = $child_table.'.id = '.$join_table.'.'.$child_singular.'_id';
        $this->db->join($child_table, $join_on, 'left');
        
        $data = $this->db->order_by('id')->get()->result();
        
        $final_arr = array();
        $current_id = FALSE;
        foreach($data as $row){
            # Prover esli eto ta ze parent zapis chto i do etogo
            if($current_id != $row->id){
                # Proverim esli bil do etogo drugaya zapis
                if(isset($final_main_obj)) array_push($final_arr, $final_main_obj);
                # Esli eto novii obiekt to sozdaem novii final_main_obj obiekt
                $final_main_obj = clone $parent_class;
                foreach($parent_class->fields as $field){
                    $final_main_obj->$field = $row->$field;
                }
                $final_main_obj->$child_table = array();
                $current_id = $row->id;
            }
            $final_sub_obj = clone $child_class;
            foreach($child_class->fields as $field){
                $field_name = $child_singular.'_'.$field;
                $final_sub_obj->$field = $row->$field_name;
            }
            foreach($join_class->fields as $field){
                $field_name = $join_singular.'_'.$field;
                $final_sub_obj->$field = $row->$field_name;
            }
            array_push($final_main_obj->$child_table, $final_sub_obj);
        }
        # push last created object
        array_push($final_arr, $final_main_obj);
        foreach($final_arr as $product){
            echo $product->name.'<br/>';
            foreach($product->nutrition_categories as $nc){
                echo 'name - '.$nc->name.' - '.$nc->value.'<br/>';
            }
        }
    }
    
}