<?php
    class Swap_db extends MY_Controller{
        
        
        public function __construct() {
            parent::__construct();
            set_time_limit(5000);
            #$this->output->enable_profiler(false);
        }
        
        public function index(){
            $this->run_nutrition_units_from_mera();
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
                                ->limit(2053,6890)
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
            $query = $this->db->select('NDB_No, Msre_Desc')           # 'Shrt_Desc'
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
            
                if(!$mera->exists()){
                    $mera->type = 2;
                    $mera->save($language);
                    $mera->set_join_field($language,'name',$row->Msre_Desc);
                    echo $row->NDB_No.'</br>';
                }
                 
                #print_flex($row);
            }
            
        }
        #        
        function run_ration_mera_from_weight(){
            $query = $this->db->select()           # 'Shrt_Desc'
                ->from('weight')
                #->limit()
                ->get()
                ->result();
            #print_flex($query);

            $product    = new A_Product(); 
            $mera       = new A_Mera();
            foreach($query as $row){
                $product->where('NDB_No',$row->NDB_No)->get();
                $mera->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->where('name',$row->Msre_Desc)->get();
                
                $mera->save($product);
                $data = array (
                            'amount'=> $row->Amount,
                            'seq'   => $row->Seq,
                            'weight'=> $row->Gm_Wgt
                );
                $mera->set_join_field($product,$data);
                echo $row->NDB_No.'</br>';
            }        
        }
        function run_mera_category_from_mera(){            
            $category    = new A_Mera_category(); 
            $meras       = new A_Mera();
            
            $meras->include_join_fields()
                        ->where_related('a_language','id',1)
                        ->limit(100,7)
                        ->get();
            foreach($meras as $mera){
                $arr_mera = current(explode(' ',$mera->join_name));
                if(strpos($arr_mera,',')!=false) $arr_mera = substr_replace($arr_mera,'',-1,1); 
                echo $arr_mera.'</br>';
                 
                #$category->get() 
                #$mera->save($);
            }
        }
        
        function run_nutrition_units_from_mera(){            
            $query = $this->db->get('nutr_def')->result();
            #$query = get_object_vars(current($query));
            #print_flex($query);
            $language = new A_Language();
            $language->get_by_id(1);
            $nutrition = new A_Nutrition();
            
            foreach($query as $row){
                $nutrition->include_join_fields()->where_related($language)
                        ->where('nutr_def',$row->Tagname)->get();
                #if(!$nutrition->exists())
                    if(!is_numeric(substr($row->NutrDesc,0,1))){
                        $nutrition->units = $row->Units;
                        $nutrition->save($language);
                        $data = array (
                            'name'      => $row->NutrDesc,
                            'nutr_def'  => $row->Tagname
                        );
                        $nutrition->set_join_field($language,$data);
                        echo $row->NutrDesc.'</br>';
                    }
            }
        }
	}
?>