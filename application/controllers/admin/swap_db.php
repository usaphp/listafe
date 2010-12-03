<?php
    class Swap_db extends MY_Controller{
        
        
        public function __construct() {
            parent::__construct();
            set_time_limit(5000);
            $this->output->enable_profiler(false);
        }
        
        public function index(){
            #$this->run_nutrition_product_from_tbl_product11();
            $this->template->load('admin/templates/main_template', 'admin/view_swap_db', $this->data);
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
        function run_nutrition_product_from_nutr_data10(){
            #
            $nutr_product = new A_Nutritions_a_product();
            $n = 0;
            while(true){
                $query = $this->db->select()           # 'Shrt_Desc'
                                    ->from('nut_data')
                                    ->limit(1000,100000+$n)
                                    ->get()
                                    ->result();
                if(!$query) return ;
                foreach($query as $row){                    
                    $nutr_product->where(array('NDB_No'=>$row->NDB_No,'Nutr_No'=>$row->Nutr_No))->get();
                    $nutr_product->value = $row->Nutr_Val;
                    $nutr_product->NDB_No = $row->NDB_No;
                    $nutr_product->Nutr_No = $row->Nutr_No;
                    $nutr_product->Num_Data_Pts = $row->Num_Data_Pts;
                    $nutr_product->Std_Error = $row->Std_Error;
                    $nutr_product->Src_Cd = $row->Src_Cd;
                    $nutr_product->Deriv_Cd = $row->Deriv_Cd;
                    $nutr_product->Ref_NDB_No = $row->Ref_NDB_No;
                    $nutr_product->Add_Nutr_Mark = $row->Add_Nutr_Mark;
                    $nutr_product->Num_Studies = $row->Num_Studies;
                    $nutr_product->Min = $row->Min;
                    $nutr_product->Max = $row->Max;
                    $nutr_product->DF = $row->DF;
                    $nutr_product->Low_EB = $row->Low_EB;
                    $nutr_product->Up_EB = $row->Up_EB;
                    $nutr_product->Stat_Cmt = $row->Stat_Cmt;
                    $nutr_product->save();
                }
                $n += 1000; 
                echo $query[count($query)-1]->NDB_No;
                #return ;
            }
                 
        }
        
        function run_nutrition_product_from_tbl_product11(){
            $products    = new A_Product();
            $nutrition_product = new A_Nutritions_a_product();
                                    
            $products->select('id, NDB_No')
                    #->limit(1)
                    ->get();
            foreach($products as $product){
                $nutrition_product->db->where('NDB_No',$product->NDB_No)                    
                    ->update('a_nutritions_a_products',array('a_product_id'=>$product->id));                
            }
            echo 'end';
            return ;
        }
        
        function run_nutrition_product_from_tbl_product12(){
            $products    = new A_Product();
            $nutrition  = new A_Nutrition();
            $products->select('id, NDB_No')->limit(1)->get();
                
            echo 'end';                
            return ;
        }
        
        function run_product_type_from_langdesc00(){
            $query = $this->db->get('langdesc')->result();
            $type = new A_Product_type();
            $language = new A_Language(1);
            foreach($query as $row){
                 $type = new A_Product_type();
                 $type->Factor = $row->Factor;
                 $type->save($language);
                 $type->set_join_field($language,'name',$row->Description);
                 print_flex($row);
            }
        }
        
        function run_product_from_product_type01(){
            #get product type
            $query = $this->db->where('NDB_No >', 11223)
                            ->get('no_langual')->result();
            $type       = new A_Product_type();
            $product    = new A_Product();
            $language = new A_Language(1);
            
            foreach($query as $row){
                $type->where('Factor',$row->Factor)->get();
                $product->where('NDB_No',$row->NDB_No)->get();
                $type->save($product);                
                $type->set_join_field($product,'Factor',$row->Factor);
                $type->set_join_field($product,'NDB_No',$row->NDB_No);
                print_flex($row);
            }
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
            #
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
        
        function run_nutrition_from_nutr_def(){            
            $query = $this->db->get('nutr_def')->result();
            $nutrition = new A_Nutrition();
            $language = new A_Language();
            $language->get_by_id(1);
            foreach($query as $row){
                $nutrition->include_join_fields()->where_related($language)
                        ->where('Nutr_No',$row->Nutr_No)->get();                
                $nutrition->units   = $row->Units;
                $nutrition->Nutr_No = $row->Nutr_No;
                $nutrition->Tagname = $row->Tagname;
                $nutrition->Num_Dec = $row->Num_Dec;
                $nutrition->SR_Order= $row->SR_Order;
                $nutrition->save($language);
                $data = array (
                    'Nutr_No'   => $row->Nutr_No,
                    'name'      => $row->NutrDesc
                );
                $nutrition->set_join_field($language,$data);
                echo $row->Nutr_No.'</br>';
            }
        }
        #
        function rating(){
            $books = array(1704,1704,1627,5089,5092,5100,3966,1635,
                            1635,1725,1725,1725,1694,1631,1631,1643,2060,1628,1629,3907,1704,1688,1688);
            #current
            foreach ($books as $book)
                $query_1 = $this->db->select_avg('rating')
                        ->where('book_id',$book)
                        ->get('book_ratings')->result();
            #new
            $query_2 = $this->db->select('book_id, AVG(rating), COUNT(user_id)')
                        ->where_in('book_id',$books)
                        ->group_by('book_id')
                        ->get('book_ratings')->result();
            //$query = $this->db->select('*')
    //                            ->from('book_ratings')
    //                            ->where_in($books)
    //                            ->get()->result();
            print_flex($query_1);
            print_flex($query_2);    
        }
	}
?>