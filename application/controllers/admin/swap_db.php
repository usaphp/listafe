<?php
    class Swap_db extends MY_Controller{
        
        
        public function __construct() {
            parent::__construct();
            set_time_limit(5000);
            $this->output->enable_profiler(false);
        }
        
        public function index(){
            $this->run_product_nutrition();
        }
        public function abbrev_product(){            

            foreach($query as $row){                
                $product = new A_Product();
                $product->NDB_No;                
            }
            echo $product->id;
        }
        function set_minerals(){
            #
            $data = array(
                'Calcium'    => 'Calcium',
                'Iron'       => 'Iron',
                'Magnesium'  => 'Magnesium',
                'Phosphorus' => 'Phosphorus',
                'Potassium'  => 'Potassium',
                'Sodium'     => 'Sodium',
                'Zinc'       => 'Zinc',
                'Copper'     => 'Copper',
                'Manganese'  => 'Manganese',
                'Selenium'   => 'Selenium'
            );
            #
            $query = $this->db->select()           # 'Shrt_Desc'
                                ->from('abbrev')
                                ->limit(1000)
                                #->get()
                                ->result();
            #
            $nutritions = new A_Nutrition();            
            $nutritions->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->where_in('name',$data)
                        ->get();
            
            $result_data = array_intersect_key(get_object_vars(current($query)),$data);                                                       
            foreach($query as $row){                
                $product = new A_Product();
                $product->where('NDB_No',$row->NDB_No)->get();
                $product->save($nutritions->all);
                foreach($nutritions as $nutrition)
                    $product->set_join_field($nutrition,'value',$result_data[$nutrition->join_name]);                
            }
            
            print_flex($query);
            print_flex($result_data);
            return ; 
        }
        function run_product_nutrition(){
            #
            $query = $this->db->select()           # 'Shrt_Desc'
                                ->from('abbrev')
                                ->limit(2053,5580)
                                ->get()
                                ->result();
            
            $nutritions = new A_Nutrition();            
            $nutritions->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->get();
                        
            
            #$result_data = get_object_vars(current($query));                                                       
            foreach($query as $row){                
                $product = new A_Product();
                $product->where('NDB_No',$row->NDB_No)->get();
                $product->save($nutritions->all);
                foreach($nutritions as $nutrition)
                    $product->set_join_field($nutrition,'value',$row->{$nutrition->join_description});                
            }
            
            print_flex($query[count($query)-1]);
            return ; 
        }
        function run_mera_from_weight(){
            $query = $this->db->select('Msre_Desc')           # 'Shrt_Desc'
                ->from('weight')
                #->limit(1000,1000)
                ->get()
                ->result();
            #print_flex($query);
            $mera       = new A_Mera();
            $language   = new A_Language(1);
            foreach($query as $row){
                $mera->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->where('name',$row->Msre_Desc)->get();
                $mera->type = 2;
                $mera->save($language);
                $mera->set_join_field($language,'name',$row->Msre_Desc);
                #print_flex($row);
            }
            
        }
        #
        function run_mera_from_abbrev(){
            $query = $this->db->select('GmWt_Desc1, GmWt_Desc2')           # 'Shrt_Desc'
                ->from('abrev')
                ->limit(1)
                ->get()
                ->result();
            print_flex($quary);
            
            $mera = new A_Mera();
            foreach($quary as $row){
                $mera->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->where('name',$row['GmWt_Desc1'])->get();
                $mera->save('a_language');
                print_flex($row);
            }
            
            foreach($quary as $row){
                $mera->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->where('name',$row['GmWt_Desc2'])->get();
                $mera->save('a_language');
                print_flex($row);
            }
            
        }
        function run_porduct_mera_from_weight(){
            $query = $this->db->select()           # 'Shrt_Desc'
                ->from('weight')
                ->limit(1)
                ->get()
                ->result();
            print_flex($quary);
            
            $mera = new A_Mera();
            foreach($quary as $row){
                $mera->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->where('name',$row['GmWt_Desc1'])->get();
                $mera->save('a_language');
                print_flex($row);
            }
            
            foreach($quary as $row){
                $mera->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->where('name',$row['GmWt_Desc2'])->get();
                $mera->save('a_language');
                print_flex($row);
            }
            
        }

	}
?>