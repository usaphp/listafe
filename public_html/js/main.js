function main(){
	
	
    main.prototype.main_search_init = function(){
    	
    	// focus on search input when page loads
    	$('.main_search_input').focus();
    	
    	// mouse click on list of types suggest
    	$('#search_suggest li').live('click', function(){
            var query_string = main.prototype.get_query_string($(this).text());
            $('.main_search_input').val(query_string);
            $('#search_suggest').hide();
            main.prototype.search_by_query(query_string, false);
    	});
    	
    	// key pressed in search input
        $('.main_search_input').keyup(function(e){
        	var query_string = main.prototype.get_query_string();
        	if(!query_string){
        		main.prototype.clear_results();
        		return false;
        	} 
        	// dont do anything when enter clicked
        	var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) { //Enter keycode
				return;
			}
        	$('.mp_big_logo').slideUp();
        	$('.left_hider').show();
            main.prototype.search_by_query(query_string, true);
        });
        
        $('#main_search_form').submit(function(){
        	var query_string = main.prototype.get_query_string();
        	if(!query_string){
        		main.prototype.clear_results();
        		return false;
        	} 
            $('#search_suggest').hide();
            main.prototype.search_by_query(query_string, false);
        	return false;
        });
        
        $('.search_results_item').live('mouseover', function(){
        	var position = $(this).position();
	  		$('.nutrition_facts', this).show().css('left', position.left + 400).css('top', position.top - 100);
        });
        $('.search_results_item').live('mouseout', function(){
	  		$('.nutrition_facts', this).hide();
        });
    }
    
    /* returns formatted query string */
    main.prototype.get_query_string = function(query_string){
        if(!query_string) query_string = $('.main_search_input').val();
        query_string = $.trim(query_string);
        return query_string;
    }
    
    main.prototype.clear_results = function(){
    	$('#search_suggest').html('').hide();
    	$('#search_results_holder').html('').hide();
    }
    
    // calls server with a query string
    main.prototype.search_by_query = function(query_string, use_suggest){
        $.ajax({
            url : '/ajax/search_suggest_products',
            dataType : 'json',
            data : { 'query_string' : query_string},
            type : 'post',
            success : function(response){                
                if(!response.status){
                    $('#search_results_holder').html('Error');
                    return;
                }
				$('#search_suggest').html('');
                
                if(use_suggest){
	                $.each(response.product_types, function(index, value) {
	                   
						$('#search_suggest').append($('<li>').html(value));
					});
					// if results = 0 hide the suggest box
					if(response.product_types.length) $('#search_suggest').show();
					else $('#search_suggest').hide();
				}
                $('#search_results_holder').html(response.product_items).show();
                return;
            }
            
        })
    }
    
    
}