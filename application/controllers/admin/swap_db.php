<?php
    
 
// Component - компонент
// объявляет интерфейс для компонуемых объектов;
// предоставляет подходящую реализацию операций по умолчанию,
// общую для всех классов;
// объявляет интерфейс для доступа к потомкам и управлению ими;
// определяет интерфейс доступа к родителю компонента в рекурсивной структуре
// и при необходимости реализует его. Описанная возможность необязательна;
abstract class Component
{
	protected $name;
 
	// Constructor
	public function Component($name)
	{
		$this->name = $name;
	}
 
	public abstract function Add(Component $c);
	public abstract function Remove(Component $c);
	public abstract function Display();
}
 
 
// Composite - составной объект
// определяет поведеление компонентов, у которых есть потомки;
// хранит компоненты-потомоки;
// реализует относящиеся к управлению потомками операции и интерфейс
class Composite extends Component
{
	private $children = array();
 
	public function Add(Component $component)
	{
		$this->children[$component->name] = $component;
	}
 
	public function Remove(Component $component)
	{
		unset($this->children[$component->name]);
	}
 
	public function Display()
	{
		print_flex($this->children);
	}
}
 
 
// Leaf - лист
// представляет листовой узел композиции и не имеет потомков;
// определяет поведение примитивных объектов в композиции;
class Leaf extends Component
{
 
	public function Add(Component $c)
	{
		print ("Cannot add to a leaf");
	}
 
	public function Remove(Component $c)
	{
		print("Cannot remove from a leaf");
	}
 
	public function Display()
	{
		echo $this->name;
	}
}
 
 

?>
<?php
    class Swap_db extends MY_Controller{
        
        
        public function __construct() {
            parent::__construct();
            set_time_limit(28800);
            
            #$this->output->enable_profiler(false);
        }
        
        public function index(){
            $this->data['all_nutr_data']                    = current($this->db->select('COUNT(NDB_No) as count')->get('nut_data')->result())->count;
            $this->data['all_nutritions_products']          = current($this->db->select('COUNT(id) as count')->get('a_nutritions_a_products')->result())->count;
            $this->data['count_product']                    = current($this->db->select('COUNT(id) as count')->where('a_product_id > ',0)->get('a_nutritions_a_products')->result())->count;
            $this->data['count_nutrition']                  = current($this->db->select('COUNT(id) as count')->where('a_nutrition_id > ',0)->get('a_nutritions_a_products')->result())->count;
            $this->data['count_product_properties']         = current($this->db->select('COUNT(id) as count')->get('a_product_properties')->result())->count;
            $this->data['count_langdesc']                   = current($this->db->select('COUNT(Factor) as count')->get('langdesc')->result())->count;
            $this->data['count_no_langual']                 = current($this->db->select('COUNT(NDB_No) as count')->get('no_langual')->result())->count;
            $this->data['count_products_product_properties']= current($this->db->select('COUNT(id) as count')->get('a_product_properties_a_products')->result())->count;
            $this->data['count_products']                   = current($this->db->select('COUNT(id) as count')->get('a_products')->result())->count;
            $this->data['count_food_des']                   = current($this->db->select('COUNT(NDB_No) as count')->get('food_des')->result())->count;
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
        
        function run_review_comment(){
            #$query = 
        }
        function run_alternative_nutrition_product_from_nutr_data(){
            $query = $this->db->select('*')
                                    ->from('nut_data')
                                    #->limit(4,10)
                                    #->where(array('NDB_No >=' => end($nutr_product_last)->maxNDB_No,'Nutr_No >=' => end($nutr_product_last)->maxNutr_No))
                                    ->get()
                                    ->result();
            $products    = $this->db->select('NDB_No, id')->get('a_products')->result();
            $nutritions  = $this->db->select('Nutr_No, id')->get('a_nutritions')->result();
            foreach($query as $row){                    
                $data = array(
                    'value'         => $row->Nutr_Val,                    
                    'NDB_No'        => $row->NDB_No,
                    'Nutr_No'       => $row->Nutr_No,
                    'Num_Data_Pts'  => $row->Num_Data_Pts,
                    'Std_Error'     => $row->Std_Error,
                    'Src_Cd'        => $row->Src_Cd,
                    'Deriv_Cd'      => $row->Deriv_Cd,
                    'Ref_NDB_No'    => $row->Ref_NDB_No,
                    'Add_Nutr_Mark' => $row->Add_Nutr_Mark,
                    'Num_Studies'   => $row->Num_Studies,
                    'Min'           => $row->Min,
                    'Max'           => $row->Max,
                    'DF'            => $row->DF,
                    'Low_EB'        => $row->Low_EB,
                    'Up_EB'         => $row->Up_EB,
                    'Stat_Cmt'      => $row->Stat_Cmt
                );
                foreach($products as $product)
                    if($product->NDB_No == $row->NDB_No){
                        $data['a_product_id'] = $product->id;
                        break;
                    } 
                foreach($nutritions as $nutrition)
                    if($nutrition->Nutr_No == $row->Nutr_No){
                        $data['a_nutrition_id'] = $nutrition->id;
                        break;
                    } 

                #print_flex($data);
                #return;
                $this->db->insert('a_alt_nutritions_a_products',$data);
                unset($row);
            }
        }
        function run_nutrition_product_from_nutr_data10(){            
            #
            #$nutr_product = new A_Nutritions_a_product();
            $n = 0;
            while(true){
                $nutr_product_last = $this->db->select('MAX(NDB_No) AS maxNDB_No, MAX(Nutr_No) AS maxNutr_No')
                ->group_by('NDB_No')                
                ->get('a_nutritions_a_products')
                ->result();
                print_flex(end($nutr_product_last));
                
                $query = $this->db->select('*')
                                    ->from('nut_data')
                                    ->limit(4)
                                    ->where(array('NDB_No >=' => end($nutr_product_last)->maxNDB_No,'Nutr_No >=' => end($nutr_product_last)->maxNutr_No))
                                    ->get()
                                    ->result();
                unset($query[0]); 
                #print_flex($query);
                                                    
//                if(!$query) return ;
//                
//                $iter_query = new ArrayIterator($query);
//                while($iter_query->valid()){
//                    $nutr_product = $this->db->select()
//                            ->where(array('NDB_No'=>$iter_query->current()->NDB_No,'Nutr_No'=>$iter_query->current()->Nutr_No))
//                            ->get('a_nutritions_a_products')->result();
//                    if(!$nutr_product) break;
//                    $iter_query->next();
//                }
                
                foreach($query as $row){                    
                    $data = array(
                        'value'         => $row->Nutr_Val,
                        'NDB_No'        => $row->NDB_No,
                        'Nutr_No'       => $row->Nutr_No,
                        'Num_Data_Pts'  => $row->Num_Data_Pts,
                        'Std_Error'     => $row->Std_Error,
                        'Src_Cd'        => $row->Src_Cd,
                        'Deriv_Cd'      => $row->Deriv_Cd,
                        'Ref_NDB_No'    => $row->Ref_NDB_No,
                        'Add_Nutr_Mark' => $row->Add_Nutr_Mark,
                        'Num_Studies'   => $row->Num_Studies,
                        'Min'           => $row->Min,
                        'Max'           => $row->Max,
                        'DF'            => $row->DF,
                        'Low_EB'        => $row->Low_EB,
                        'Up_EB'         => $row->Up_EB,
                        'Stat_Cmt'      => $row->Stat_Cmt
                    );
                    
                    echo $row->NDB_No.' '.$row->Nutr_No.'</br>';
                    $this->db->insert('a_nutritions_a_products',$data);
                    #return ;
                }
                
                $n += 1000; 
                echo $query[count($query)-1]->NDB_No;
                #return ;
            }
                 
        }
        function run_nutrition_product_from_product(){
            $query = $this->db->select('NDB_No, id')->get('a_products')->result();
            $stdclass = new stdClass();
            foreach($query as $row){                
                print_flex($row);
                
                return ;
                $this->db->where('NDB_No',$row->NDB_No)->update('a_alt_nutritions_a_products',array('a_product_id' => $row->id));
                
            }
        }
        function run_nutrition_product_from_tbl_product11(){
            $last_product_id = current($this->db->select('MAX(a_product_id) as max')->get('a_nutritions_a_products')->result())->max;
                                  
            $products = $this->db->select('id, NDB_No')
                        ->where('id >= ',$last_product_id)                        
                        ->get('a_products')->result();
            foreach($products as $product){
                $this->db->where('NDB_No',$product->NDB_No)                    
                    ->update('a_nutritions_a_products',array('a_product_id'=>$product->id));                
            
            }
            echo $last_product_id;
            return true;
        }
        
        function run_nutrition_product_from_tbl_nutrition12(){
            $last_nutrition_id = current($this->db->select('MAX(a_nutrition_id) as max')->get('a_nutritions_a_products')->result())->max;
                                  
            $nutritions = $this->db->select('id, Nutr_No')
                        ->where('id >= ',$last_nutrition_id)                        
                        ->get('a_nutritions')->result();
            foreach($nutritions as $nutrition){
                $this->db->where('Nutr_No',$nutrition->Nutr_No)                    
                    ->update('a_nutritions_a_products',array('a_nutrition_id'=>$nutrition->id));                
            
            }
            echo $last_nutrition_id;
            return true;
        }
        
        function run_product_properties_from_langdesc00(){
            $query = $this->db->get('langdesc')->result();
            $type = new A_Product_property();
            $language = new A_Language(1);
            foreach($query as $row){
                 $type = new A_Product_property();
                 $type->Factor = $row->Factor;
                 $type->save($language);
                 $type->set_join_field($language,'name',$row->Description);
                 print_flex($row);
            }
        }
        
        function run_properties_products(){
            #get product type
            $last_product_id = current($this->db->select('MAX(a_product_id) as max')->get('a_product_properties_a_products')->result())->max;
            $products = new Product();
            $products->where('id >=',$last_product_id)->get('a_products');
            foreach($products as $product)
                echo $product->id;
            return ;
            foreach($products as $product){
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
        function run_Product_type_from_Product_language20(){
            $products = $this->db->select('id as a_product_id, name')->get('a_products')->result();
            
            foreach($products as $row){
                
                $type_name = current(explode(',',$row->name));
                
                $product_type = $this->db->select()->where('name',$type_name)->get('a_product_types')->result();
                
                if(!$product_type){
                    $this->db->insert('a_product_types',array('name' => $type_name));
                    $product_type = $this->db->select()->where('name',$type_name)->get('a_product_types')->result();
                }
                print_flex(current($product_type));
                $this->db->update('a_products',array('a_product_type_id'=>current($product_type)->id),array('id'=>$row->a_product_id));                
            }
        }
        function run_Product_type_languages_from_Product_type22(){
            $types = $this->db->get('a_languages_a_product_types')->result();
            foreach($types as $type)
                $this->db->update('a_languages_a_product_types',array('a_language_id'=>1),"id = $type->id");
            
        }
        function run_Product_type_languages_from_Product_type21(){
            $types = $this->db->get('a_product_types')->result();
            foreach($types as $type){
                if(!$this->db->select()->where(array('a_product_type_id'=>$type->id,'name'=>$type->name))->get('a_languages_a_product_types')->result())
                    $this->db->insert('a_languages_a_product_types',array('a_product_type_id'=>$type->id,'name'=>$type->name,'a_language_id' => 1));
            
            }
        }

        function run_Product_type_from_Product_category30(){
            $categories = $this->db->get('a_product_categories')->result();
            foreach($categories as $category){
                $products           = $this->db->select('NDB_No, FdGrp_CD, a_product_type_id')
                                        ->where('FdGrp_CD',$category->FdGrp_CD)->group_by('NDB_No')
                                        ->get('a_products')->result();
                #print_flex($products);                                        
                $product_types_id   = array_map(function($x){return $x->a_product_type_id;},$products);
//                $NDB_Nos    = array_map(function($x){return $x->NDB_No;},$food_des);
//                $products   = $this->db->select('a_product_type_id, a_product_types.name')->where_in('NDB_No',$NDB_Nos)
//                                    ->join('a_product_types','a_product_types.id=a_products.a_product_type_id','left')
//                                    ->group_by('a_product_type_id')->get('a_products')->result();
                                                    
                
                #print_flex($product_types_id);
                
                $this->db->where_in('id',$product_types_id)
                            ->update('a_product_types',array('a_product_category_id' => $category->id));
                #return ;
//                print_flex($food_des);
//                print_flex($NDB_Nos);
//                print_flex($products);
//                print_flex($product_types_id)
//            return ;
            }
            
        }
        
        function run_Language_Product_type_from_Product_types(){
            $product_type_names = $this->db->select('name, id')->get('a_product_types')->result();
            foreach($product_type_names as $type_name){
                $this->db->insert('a_languages_a_product_types',array('a_product_type_id'=>$type_name->id,'a_language_id'=>1,'name'=>$type_name->name));
            }
        }
        function run_product_from_food_des(){
            $food_des = $this->db->select('NDB_No, FdGrp_CD, Long_Desc')->get('food_des')->result();
            foreach($food_des as $row){
                $data = array (
                    'NDB_No'    => $row->NDB_No,
                    'FdGrp_CD'  => $row->FdGrp_CD,
                    #'name'      => current(explode(',',$row->Long_Desc))
                    'name'      => $row->Long_Desc
                );
                $this->db->where('NDB_No',$row->NDB_No)->update('a_products',$data);
            }
        }
        #
        function report(){
            $query = $this->db->select(' report_on_id, report_on_type, review_id')
                                ->from('reports')
                                ->where('report_on_type =','review')
                                ->join('review_comments','review_comments.id = reports.report_on_id')
                                ->where('report_on_type =','comment')
                                
                                ->get();
        }
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
            $x= new AppendIterator();
            $x->append($query_2);
            print_flex($x);
            //$query = $this->db->select('*')
    //                            ->from('book_ratings')
    //                            ->where_in($books)
    //                            ->get()->result();
            print_flex($query_1);
            print_flex($query_2);    
        }
        function run_component_proba(){
                        // Create a tree structure
            $root = new Composite("root");
             
            $root->Add(new Leaf("Leaf A"));
            $root->Add(new Leaf("Leaf B"));
             
            $comp = new Composite("Composite X");
             
            $comp->Add(new Leaf("Leaf XA"));
            $comp->Add(new Leaf("Leaf XB"));
            $root->Add($comp);
            $root->Add(new Leaf("Leaf C"));
             
            // Add and remove a leaf
            $leaf = new Leaf("Leaf D");
            $root->Add($leaf);
            $root->Remove($leaf);
             
            // Recursively display tree
            $root->Display();
        }
        function run_axaj_proba(){
            $product_type_names = new Languages_Product_type();
            $product_type       = new Product_type();
      
            $product_type_names->like('name', 'ch', 'after')->get(5);
                        
            #PRODUCT_by_first_type
            if(isset($product_type_names->all[0])){
                $product_type->get_full_info($product_type_names->all[0]->id);
                
                $product_type->product->get_short_info();
                
                $data['dm_products'] = $product_type->product;      
                $return_arr['product_items'] = $this->load->view('search/products/items',$data, true);
            }else
                $return_arr['product_items'] = array();
                
                foreach($product_type->product as $product){
                    print_flex($product->nutrition->data);    
                    echo dm_get_value_by_field('Protein',$product->nutrition,'join_name');
                    return ;
                }
                #print_flex(dm_get_value_by_field('Protein',$product_type->product->nutrition,'join_name'));
                
                
        }
	}
?>