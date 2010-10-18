<?php

class Products extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        
	}
	
	function index()
	{
        $this->show();
	}
    
    function show()
    {
        $products = new Product();
        $products->get_iterated();
        $products->include_related('mera', array('name'))->get();
        $products->include_related('category', array('name'))->get();
        $data['products'] = $products;
        $this->template->load('/admin/templates/main_template', '/admin/products/show', $data);
    }
    
    function delete($id = false){
        if($id){
            $product = new Product($id);
            if($product->exists()) $product->delete();
        }
        $this->session->set_flashdata('top_success', 'Продукт удален');
        redirect('admin/products/show');
    }
    
    function edit($id = false)
    {
        $this->load->library('form_validation');
        # Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'products_edit_init', 'data' => FALSE));
        
        $category	= new Category();
        $mera		= new Mera();
		$nutrition_categories = new Nutrition_category();
		$nutrition_categories_arr = array();
		foreach($nutrition_categories->get() as $nc) {
			$nutrition = new Nutrition();
			$nutrition->where(array('nutrition_category_id' => $nc->id))->get();
			$nc->nutritions = $nutrition;
			if($id){
				$product_nutrition_facts = new Product_nutrition_fact();
				$product_nutrition_facts->include_related('nutrition')->where(array('product_id' => $id, 'nutrition_category_id' => $nc->id))->get();
				$nc->product_nutrition_facts = $product_nutrition_facts;
			}
			array_push($nutrition_categories_arr, $nc);
		}
		
        $product = new Product($id);
        
        #TODO finish all the validation
        $rules = array(
            array('field' => 'product_name', 'label' => 'Название продукта', 'rules' => 'trim|required|xss_clean|_product_name_exists'),
            array('field' => 'price', 'label' => 'Цена', 'rules' => 'required|number'),
            array('field' => 'units_for_price', 'label' => 'Цена за единиц', 'rules' => 'required|number'),
            array('field' => 'units_mera_id', 'label' => 'Мера измерения', 'rules' => 'required|number'),
            array('field' => 'calories', 'label' => 'Калорий', 'rules' => 'required|integer'),
        );
        # ^ dinamic filling categories from DB         
        foreach($nutrition_categories_arr as $nutrition_category){
            array_push($rules, array('field' => 'nutrition_category'.$nutrition_category->id, 'label' => $nutrition_category->name, 'rules' => 'required|number'));
        }
        
        $this->form_validation->set_rules($rules);
        //if form validates
        if($this->form_validation->run()){
            $product->name              = $this->input->post('product_name');
            $product->category_id       = $this->input->post('category_id');
            $product->calories          = $this->input->post('calories');
            $product->protein           = $this->input->post('protein');
            $product->fat               = $this->input->post('fat');
            $product->carbo             = $this->input->post('carbo');
            $product->mera_id           = $this->input->post('mera_id');
            $product->price             = $this->input->post('price');
            $product->units_for_price   = $this->input->post('units_for_price');
            $product->units_mera_id     = $this->input->post('units_mera_id');
            $product->description       = $this->input->post('description');
            //if products was saved to db successfully
            if($product->save()){
                $image_upload_status = '';
                if(!$this->_upload_product_images($product->id)) $data['form_error'] = $this->upload->display_errors();
                $this->data['form_success'] = 'Продукт добавлен';
            }else{
                $this->data['form_error'] = $product->error->string;
            }
        }


        $this->data['category_model']	= $category->get_iterated();
        $this->data['mera_model']		= $mera->get_iterated();
        $this->data['nutrition_categories'] = $nutrition_categories_arr;
        $this->data['product'] 			= $product;
		
		
        $this->template->load('/admin/templates/main_template', '/admin/products/edit', $this->data);
    }
    
    //uploads products image
    function _upload_product_images($product_id){
        //set all the appropriate data
        $product = new Product($product_id);
        $image_name = 'pi'.$product_id.'.jpg';
        $product->image = $image_name;
        
        //define upload class with configs
        $config['upload_path'] = $this->config->item('product_images_path');
		$config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $image_name;
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        //try to upload file
        if ($this->upload->do_upload('image')){
            $product->save();
            $upload_data = $this->upload->data();
            $this->_resize_image($upload_data['full_path']);
            return true;
        }else{
            return false;   
        }
    }
    
    function _resize_image($image_path){
        $config['source_image']     = $image_path;
        $config['create_thumb']     = TRUE;
        $config['thumb_marker']     = '_tiny';
        $config['width']            = 40;
        $config['height']           = 40;
        $config['master_dim']       = 'width';
        $config['maintain_ratio']   = TRUE;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    
    //checks to see if product name already exists    
    function _product_name_exists($product_name){
        $product = new Product();
        $product->where('name', $product_name)->get();
        if($product->exists()) return false;
        return true;
    }
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/products.php */