function main(){
    
    main.admin_url = 'http://local.povarenok/admin/';
    
    main.prototype.general_init = function(){
        $('form.f_validate').validate();
    }
    
    main.prototype.login_init = function(){
    	$('#login_form').validate({
    		rules : { username : 'required', password : 'required' },
    		messages : { username : 'Введите имя пользователя', password : 'Введите пароль' },
    		submitHandler: function(form) {
    			$(form).ajaxSubmit({
    				dataType : 'json',
                    type : 'post',
    				url: "/admin/ajax/login",
    				success: function(response) {
    					if(response.status){
    						window.location = response.message;
    					}else{
    					   $('#message_block').html("<div class= 'error_message'>"+response.message+"</div>");
    					}
    				}
    			});
    		}
    	});
    	
    	$('#login_button').click(function(){
    		$('#message_block').html('');
    	});
    }
    
    main.prototype.dropdown_init = function(){
        $("ul.dropdown li").hover(function(){
            $(this).addClass("hover");
            $('ul:first',this).css('visibility', 'visible');
        }, function(){
            $(this).removeClass("hover");
            $('ul:first',this).css('visibility', 'hidden');
        });
        $("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");
    }
    
    main.prototype.tabs_init = function(){
        $('.tabs li a').click(function(){
            $('.tabs li a').removeClass('selected');
            $(this).addClass('selected');
            $('.tab_content').hide();
            var id = $(this).attr('id')+'_tab';
            $('#' + id).show();
            return false;    
        });
    }
    
    main.prototype.recipe_add_init = function(){
    	$('#add_step').click(function(){
    		var next_step = parseInt($('#total_steps').val()) + 1;
    		$.ajax({
    			url  : main.admin_url + 'ajax/add_step',    			 
                data : {'step_id' : next_step },
    			type : 'post',
    			success : function(response){
                    		     
    				$('#recipe_steps').append(response);
    				$('#total_steps').val(next_step);
    			}
    		});
    		return false;	
    	});
    	
    	$('#add_product_recipe').click(function(){
    		var next_product_id = parseInt($('#total_products').val()) + 1;
    		$.ajax({
    			url : main.admin_url + 'ajax/add_recipe_product',
    			data : { 'recipe_product_id' : next_product_id },
    			type : 'post',
    			success : function(response){
    				$('#recipe_products').append(response);
    				$('#total_products').val(next_product_id);
                    $('.suggest_product').autocomplete(main.admin_url + "ajax/suggest_products", {
            		      width : $(this).attr('width')
                    });
    			}
    		});
    		return false;
    	})
    	
    	$('#add_recipe_form').validate({
    		rules : {
    			'recipe_name'	: { required : true },
    			'prep_time'		: { required : true, number : true },
    			'cook_time' 	: { required : true, number : true },
    			'servings' 		: { required : true, number : true },
    			//'recipe_image'	: { required : true, number : true }
    		}
    	});
    	
    	$('#add_recipe').click(function(){
    		$('#add_recipe_form').submit();
    		return false;
    	})
    	
    	$('.suggest_product').autocomplete(main.admin_url + "ajax/suggest_products", {
            width : $(this).attr('width')
        });
        
    }
    
    main.prototype.product_edit_init = function(){
        $('#product_edit_form').validate({
            rules : {
                'product_name' : "required",
                'product_category_id' : {required : true, number : true},
                'calories' : { required : true, number : true},
                'fat' : { required : true, number : true},
                'protein' : { required : true, number : true},
                'carbo' : { required : true, number : true},
                'mera_id' : { required : true, number : true},
                'price' : "required",
                'units_for_price' : { required : true, number : true},
                'units_mera_id' : {required : true, number : true}
                }
        });
        /*
        $('#add_product_form').ajaxForm({
            dataType : "json",
            success : function(response){
                main.prototype.process_ajax_response(response, 'add_product');
            }
        })*/
        
    }
    main.prototype.products_show_init = function(){
        $('.load_product_types').live('click',function(){
            var elem_id = $(this).attr('id').replace('product_category_', '');
            $.ajax({
               url : '/admin/ajax/get_product_types_list',
               data : { 'category_id' : elem_id },
               type : 'POST',
               success : function(response){
                    $('#product_types_holder_'+elem_id).html(response);
               }    
            });
   		   return false;
    	});
        
        $('.load_products').live('click',function(){
            var elem_id = $(this).attr('id').replace('product_type_', '');
            $.ajax({
               url : '/admin/ajax/get_products_list',
               data : { 'type_id' : elem_id },
               type : 'POST',
               success : function(response){
                    $('#products_holder_'+elem_id).html(response);
               }    
            });
   		   return false;
    	});
        
    }
    
    main.prototype.product_category_edit_init = function(){
        $('#product_category_edit_form').validate({
            rules : {
                'product_category_name' : "required"
                }
        });           
    }
    
    main.prototype.process_ajax_response = function(response, form_name){
        if(response.status){
            $('#'+form_name+'_status').html(response.message).attr('class', 'f_general_success');
        }else{
            $('#'+form_name+'_status').html(response.message).attr('class', 'f_general_error');;
        }
    }

    main.prototype.nutritions_edit_init = function(){
        $('#nutrition_edit_form').validate({
            rules : {
                //'nutrition_name'				: "required",
                //'nutritions_categories_id'		: "required"
                }
        });        
    }

    main.prototype.products_edit_init = function(){
    	
        $('a.f_subinput_node').click(function(){
    		var elem_id = $(this).attr('id').replace('f_subinput_node_', '');
    		$('#f_subinput_node_holder_' + elem_id).toggle();
    		return false;
    	});
        $('#mera_id').change(function(){
            $.ajax({
                url     : '/admin/ajax/get_nutrition_by_mera',
                data    : { mera_id : $('#mera_id').val(),
                            number_product_id : $('#number_product_id').val()},
                type    : 'POST',
                success : function(response){
                    $('#nutrition_wrapper').html(response);
                }
            });
        });
    	
    }
    main.prototype.ratio_meras_edit_init = function(){            	
    	$('#load_product').click(function(){
    	   $.ajax({
    	       url : '/admin/ajax/get_ratios',
               data : { product_name : $('#inp_product').val() },
               type : 'POST',
               success : function(response){
                    $('#product_meras').html(response);
               }    
    	   });
   		   return false;
    	});
        
        
    	$('#save_product').live('click', function(){
    	   $('#edit_ratio_meras_form').submit();
           return false;
    	});
             	        
    	$('.suggest_product').autocomplete(main.admin_url + "ajax/suggest_products", {
    		      width : $(this).attr('width')
            });
            $('#add_ratio').click(function(){    		
    		$.ajax({
    			url : main.admin_url + 'ajax/add_ratio_mera',			
    			type : 'post',
    			success : function(response){
    				$('#ratio_options_holder').append(response);
    			}
    		});
    		return false;
        	});
        $('.f_remove').live('click', function(){
    		var elem_id = $(this).attr('id').replace('remove_ratio_', '');
            var hidden_remove = $('<input type="hidden">').val(elem_id).attr('name', 'hidden_ratio_removed[]');
            
            if(!$('input[type=hidden][value='+elem_id+'][name=hidden_ratio_removed[]]').length){
                $('#remove_ratio_' + elem_id).text('restore').attr('class','f_remove f_button green');
                $('#edit_ratio_meras_form').append(hidden_remove);
            }else{
                $('#remove_ratio_' + elem_id).text('delete');
                $('#remove_ratio_' + elem_id).text('delete').attr('class','f_remove f_button grey');
                $('input[type=hidden][value='+elem_id+'][name=hidden_ratio_removed[]]').remove();
            }
    		return false;
    	});
        
    }
    main.prototype.product_categories_edit_init = function(){
        
    }
    main.prototype.nutrition_categories_edit_init = function(){
        
	}
    main.prototype.nutritions_edit_init = function(){
	}
    main.prototype.recipes_edit_init = function(){
       	$('#add_step').click(function(){
    		var next_step = parseInt($('#total_steps').val()) + 1;
    		$.ajax({
    			url  : '/admin/ajax/add_step',    			
                data :{'step_id' : next_step},
    			type : 'post',
    			success : function(response){                        			     
    				$('#recipe_steps').append(response);
    				$('#total_steps').val(next_step);
    			}
    		});
    		return false;	
    	});
    	
    	$('#add_product_recipe').click(function(){
    		var next_product_id = parseInt($('#total_products').val()) + 1;
    		$.ajax({
    			url : '/admin/ajax/add_recipe_product',
    			data : { 'recipe_product_id' : next_product_id },
    			type : 'post',
    			success : function(response){
    				$('#recipe_products').append(response);
    				$('#total_products').val(next_product_id);
                    $('.suggest_product').autocomplete("/admin/ajax/suggest_products", {
            		      width : $(this).attr('width')
                    });
    			}
    		});
    		return false;
    	});
        
        $('.f_remove').click(function(){
    		var elem_id = $(this).attr('id').replace('remove_product_', '');
            var hidden_remove = $('<input type="hidden">').val(elem_id).attr('name', 'hidden_product_removed[]');
            
            if(!$('input[type=hidden][value='+elem_id+'][name=hidden_product_removed[]]').length){
                $('#remove_product_' + elem_id).text('restore').attr('class','f_remove f_button green');
                $('#edit_recipe_form').append(hidden_remove);
            }else{
                $('#remove_product_' + elem_id).text('delete');
                $('#remove_product_' + elem_id).text('delete').attr('class','f_remove f_button grey');
                $('input[type=hidden][value='+elem_id+'][name=hidden_product_removed[]]').remove();
            }
    		return false;
    	});
    	
    	$('#add_recipe_form').validate({
    		rules : {
    			'recipe_name'	: { required : true },
    			//'prep_time'		: { required : true, number : true },
    			//'cook_time' 	: { required : true, number : true },
    			//'servings' 		: { required : true, number : true },
    			//'recipe_image'	: { required : true, number : true }
    		}
    	});
    	
    	$('#save_recipe').click(function(){
    		$('#edit_recipe_form').submit();
    		return false;
    	})
    	
    	$('.suggest_product').autocomplete('/admin/ajax/suggest_products', {
            width : $(this).attr('width')
        });
        
    }
    	
    // recipes translation adding/editing page	
    main.prototype.translate_recipes_init = function(){
    	$('#translate_recipe_edit_form').validate({
    		rules : { 
    				'inp_url' : { 
    					required : true , 
    					remote : { 
    						url: "/admin/ajax/translate_recipe_url_valid_insert", 
    						type: 'post',
    						data : { recipe_translate_id : function(){ return $('#recipe_translate_id').val(); } } }
    			
    		 			},
    		 		'text_name' : {
    		 			required : true,
    		 			remote : {
    		 				url: "/admin/ajax/translate_recipe_name_valid_insert",
    		 				type: 'post',
    		 				data : { recipe_translate_id : function(){ return $('#recipe_translate_id').val(); } } }
    		 		 }	 
    		 	},
    		messages : {
    				'inp_url' : { remote : 'Этот рецепт уже есть в базе данных.' },
    				'text_name' : { remote : 'Это название рецепта уже есть в базе данных.' }
    		}
    	});
    }
    main.prototype.language_name_init = function(){
        $('#btn_language_add_id').click(function(){
    		$.ajax({
    			url  : '/admin/ajax/add_language',
                data : {total_language_names : $('#total_language_names').val()},
    			type : 'post',
    			success : function(response){
    			    if (response) $('#total_language_names').val(parseInt($('#total_language_names').val())+1);
                    $('#language_block_id').append(response);
    			}
    		});
    		return false;
   	    });
    }
    main.prototype.language_text_init = function(){
        $('.btn_language_add_text').live('click', function(){
        var elem_id = $(this).attr('id').replace('btn_language_add_', '');
    		$.ajax({
    			url  : '/admin/ajax/add_language',
                data : {total_language_names : $('#total_language_' + elem_id).val(),param : 'textarea'},
    			type : 'post',
    			success : function(response){
    			    if (response) $('#total_language_' + elem_id).val(parseInt($('#total_language_' + elem_id).val())+1);  
                    $('#language_block_' + elem_id).append(response);				
    			}
    		});
    		return false;
   	    });
    }
    main.prototype.home_product_categories_init = function(){}
    main.prototype.home_products_init = function(){}    
}