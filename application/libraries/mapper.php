<?php 
class Mapper {
    
    private $db;
    
    public function __construct() {
        $this->CI = & get_instance();
        $this->db = $this->CI->db;
    }
    
    public function load_data($parent, $child, $join_table) {
        $parent_class = new $parent();
        $child_class = new $child();
        
        $parent_singular = strtolower($parent);
        $child_singular = strtolower($child);
        
        $parent_table = strtolower(plural($parent));
        $child_table = strtolower(plural($child));
        
        
        $select_arr = array();
        foreach($child_class->fields as $field){
            $select_string = $child_table.'.'.$field.' as '.$child_table.'_'.$field;
            array_push($select_arr, $select_string);
        }
        $select_string = implode(', ', $select_arr);
        
        $this->db->select();
        $this->db->from($parent_table);
        
        $join_on = $parent_table.'.id = '.$join_table.'.'.$parent_singular.'_id';
        $this->db->join($join_table, $join_on);
        
        $join_on = $child_table.'.id = '.$join_table.'.'.$child_singular.'_id';
        $this->db->join($child_table, $join_on);
        
        $data = $this->db->get()->result();
        print_flex($data);
    }
    
}