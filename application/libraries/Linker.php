<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linker {
	
	function __construct() {
		$this->CI =& get_instance();
	}
	
	/* Generates a link to author info page
	 * 
	 * $data - object which contents a row from authors table
	 * 
	 * $data['id'] - author id
	 * $data['first_name'] - first name
	 * $data['last_name'] - last name
	 * 
	 * */
 	
	#'a_' znachit /admin/ v linke
	# Login page for admin
	function a_login_link(){
		$segments = array('admin', 'security', 'login');
		$url = generate_url($segments);
		return $url;
	}
	
	# logout admin user 
	function a_logout_link(){
		$segments = array('admin', 'security', 'logout');
		$url = generate_url($segments);
		return $url;
	}
	
	/* returns admin homepage link */
	function a_home_link(){
		$segments = array('admin');
		$url = generate_url($segments);
		return $url;
	}
	
    #RECIPE 
	function a_recipe_add_link() {
		//return link to homepage if data for author was false or null
		$segments = array('admin','recipes','add');
		$url = generate_url($segments);
		return $url;
	}
    function a_recipe_show_link() {
		//return link to homepage if data for author was false or null
		$segments = array('admin','recipes','show');
		$url = generate_url($segments);
		return $url;
	}
    function a_recipe_edit_by_id_link($id = FALSE) {
		//return link to homepage if data for author was false or null
		if(!$id) return $this->home_page_link();
		$segments = array('admin','recipes','edit',$id);
		$url = generate_url($segments);
		return $url;
	}
    function a_recipe_delete_by_id_link($id = FALSE) {
		//return link to homepage if data for author was false or null
		if(!$id) return $this->home_page_link();
		$segments = array('admin','recipes','delete',$id);
		$url = generate_url($segments);
		return $url;
	}
    
    #PRODUCT admin/products/
    function a_products_show_link() {
		//return link to homepage if data for author was false or null
		$segments = array('admin','products','show');
		$url = generate_url($segments);
		return $url;
	}
    function a_products_add_link() {
		$segments = array('admin','products','edit');
		$url = generate_url($segments);
		return $url;
	}
    function a_products_edit_by_id_link($id = false) {
        if(!$id) $this->a_products_show_link();
		$segments = array('admin','products','edit',$id);
		$url = generate_url($segments);
		return $url;
	}
    
    #PRODUCT_CATEGORIES admin/product_categories/
    function a_product_categories_show_link() {
		//return link to homepage if data for author was false or null
		$segments = array('admin','product_categories','show');
		$url = generate_url($segments);
		return $url;
	}
    function a_product_categories_add_link() {
		//return link to homepage if data for author was false or null
		$segments = array('admin','product_categories','edit');
		$url = generate_url($segments);
		return $url;
	}
    function a_product_categories_edit_by_id_link($id = false) {
        if(!$id) $this->a_product_categories_show_link();
		$segments = array('admin','product_categories','edit',$id);
		$url = generate_url($segments);
		return $url;
	}
    #RATIO_MEARS admin/ratio_meras/subs/product_data
    function a_ratio_meras_edit_by_id_link($id = false) {
        if(!$id) 
            $segments = array('admin','ratio_meras','edit');
        else 
            $segments = array('admin','ratio_meras','edit',$id);
		$url = generate_url($segments);
		return $url;
	}
    function a_ratio_meras_show_link() {        
        $segments = array('admin','ratio_meras','show');        
		$url = generate_url($segments);
		return $url;
	}
    function a_ratio_meras_edit_data_by_id_link() {
		$segments = array('admin','ratio_meras','subs','product_data');
		$url = generate_url($segments);
		return $url;
	}
    #NUTRITION admin/nutritions
    function a_nutrition_show_link() {
		//return link to homepage if data for author was false or null
		$segments = array('admin','nutritions','show');
		$url = generate_url($segments);
		return $url;
	}
    function a_nutrition_add_link() {
		//return link to homepage if data for author was false or null
		$segments = array('admin','nutritions','edit');
		$url = generate_url($segments);
		return $url;
	}
    function a_nutritions_edit_by_id_link($id = false) {
        if(!$id) $this->a_nutritions_show_link();
		$segments = array('admin','nutritions','edit',$id);
		$url = generate_url($segments);
		return $url;
	}
    
    #NUTRITION CATEGORIES admin/nutrition_categories
    function a_nutrition_categories_show_link() {
		//return link to homepage if data for author was false or null
		$segments = array('admin','nutrition_categories','show');
		$url = generate_url($segments);
		return $url;
	}
    function a_nutrition_categories_add_link() {
		$segments = array('admin','nutrition_categories','edit');
		$url = generate_url($segments);
		return $url;
	}
    function a_utrition_categories_edit_by_id_link($id = false) {
        if(!$id) $this->a_nutrition_categories_show_link();
		$segments = array('admin','utrition_categories','edit',$id);
		$url = generate_url($segments);
		return $url;
	}
    #TRANSLATE_RECIPES
    function a_translate_recipes_show_link(){
        $segments = array('admin','translate_recipes','show');
        $url = generate_url($segments);
        return $url;
    }
    function a_translate_recipes_edit_by_id_link($id = false){
        if(!$id) a_translate_recipes_show_link();
        $segments = array('admin','translate_recipes','edit',$id);
        $url = generate_url($segments);
        return $url;
    }
    function a_translate_recipes_add_link(){    
        $segments = array('admin','translate_recipes','add');
        $url = generate_url($segments);
        return $url;
    }
	/* Returns link to home page */
	function home_page_link() {
		return base_url();
	}

}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */