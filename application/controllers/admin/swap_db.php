<?php
    class Swap_db extends MY_Controller{
        
        
        public function __construct() {
            parent::__construct();
            set_time_limit(600);
        }
        
        public function index(){
            $this->set_minerals();
        }
        public function abbrev_product(){            

            foreach($query as $row){                
                $product = new A_Product();
                $product->NDB_No;                
            }
            echo $product->id;
        }
        function set_minerals(){
//            $Calcium    = 'Calcium';
//            $Iron       = 'Iron';
//            $Magnesium  = 'Magnesium';
//            $Phosphorus = 'Phosphorus';
//            $Potassium  = 'Potassium';
//            $Sodium     = 'Sodium';
//            $Zinc       = 'Zinc';
//            $Copper     = 'Copper';
//            $Manganese  = 'Manganese';
//            $Selenium   = 'Selenium';
            
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
            
            $query = $this->db->select($data)           # 'Shrt_Desc'
                                ->from('abbrev')
                                ->get()
                                ->result();
            $nutritions = new A_Nutrition();
            
            $nutr_id = $this->db->selcet()
            
            return ;                                            
            foreach($query as $row){                
                $product = new A_Product();
                $product->where('NDB_No',$row->NDB_No)->get();
                #$product->;                
            }
        }

	}
?>