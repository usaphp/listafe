function main(){

main.admin_url = 'http://local.povarenok/admin/';

main.prototype.general_init = function(){
    $('form.f_validate').validate();
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
			url : main.admin_url + 'ajax/add_step',
			data : { 'step_id' : next_step },
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
			//'prep_time'		: { required : true, number : true },
			//'cook_time' 	: { required : true, number : true },
			//'servings' 		: { required : true, number : true },
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
                'nutrition_name'				: "required",
                'nutritions_categories_id'		: "required"
                }
        });
    }

    main.prototype.products_edit_init = function(){
    	$('a.f_subinput_node').click(function(){
    		var elem_id = $(this).attr('id').replace('f_subinput_node_', '');
    		$('#f_subinput_node_holder_' + elem_id).toggle();
    		return false;
    	});
    	$('.add_nutrition_fact').click(function(){
            // update next id for the next product nutrition
    		var next_id = $('#max_nutrition_fact').val();
    		// get id of the current pressed add link
    		var elem_id = $(this).attr('id').replace('add_product_fact_', '');
    		// create a content for new nutrition
    		var div_content = $('#sel_nutrition_' + elem_id + ' option:selected').text() + ' - ' + $('#inp_nutrition_' + elem_id).val() + ' ';
            // create a "remove" link for new nutrition
    		var remove_link = $('<a>').text('remove');
    			remove_link.attr({
    				'id' : 'nutrition_fact_remove_' + next_id,
    				'href' : '#',
    				'class' : 'nutrition_fact_remove'
    			});
    		// create a hidden field with data about this nutrition
    		var hidden_field = $('<input type="hidden">').val($('#sel_nutrition_' + elem_id).val() + '_' + $('#inp_nutrition_' + elem_id).val()).attr('name', 'hidden_nutrition[]');
    		// build the final div
    		var nutrition_fact_div = $('<div>').html(div_content).append(hidden_field).append(remove_link);
    			nutrition_fact_div.attr({
    				'id' : 'hidden_nutrition_wrapper_' + next_id
    			});
    		// append final div to the wrapper
    		$('#prod_nutritions_wrapper_' + elem_id).append(nutrition_fact_div);
            // update last nutrition id
    		$('#max_nutrition_fact').val(parseInt(next_id)  + 1);
    		
    		return false;
    	});
    	
    	// Click on remove nutrition factt button
    	$('.nutrition_fact_remove').live('click', function(){
    		var elem_id = $(this).attr('id').replace('nutrition_fact_remove_', '');
            // keep removed value
            var removed_value = $('#hid_nutrition_fact_' + elem_id).val();
    		$('#hidden_nutrition_wrapper_' + elem_id).remove();
            // if this link has a class nf_remove_from_db - it means that this nutrition is in database and we need to delete it
            if($(this).hasClass('nf_remove_from_db')){
                // geenrates a hidden input field with data about removed nutrition - so in controller we ca removet this nutrition for product
                var hidden_remove = $('<input type="hidden">').val(removed_value).attr('name', 'hidden_nutrition_removed[]');
                $('#product_edit_form').append(hidden_remove);
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
    			url : main.admin_url + 'ajax/add_step',
    			data : { 'step_id' : next_step },
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
    	
    	$('.suggest_product').autocomplete(main.admin_url + "ajax/suggest_products", {
    		      width : $(this).attr('width')
            });
    	}
}