function main(){
	
	
    main.prototype.main_search_init = function(){
    	
    	// focus on search input when page loads
    	$('.main_search_input').focus();
    	
    	// mouse click on list of types suggest
    	$('#search_suggest li').live('click', function(){
            var query_string = $(this).text();
            $('.main_search_input').val(query_string);
            $('#search_suggest').hide();
            main.prototype.search_by_query(query_string, false);
    	});
    	
    	// key pressed in search input
        $('.main_search_input').keyup(function(e){
        	var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) { //Enter keycode
				return;
			}
        	$('.mp_big_logo').slideUp();
        	$('.left_hider').show();
            var query_string = $(this).val();
            main.prototype.search_by_query(query_string, true);
        })
        
        $('#main_search_form').submit(function(){
            var query_string = $('.main_search_input').val();
            $('#search_suggest').hide();
            main.prototype.search_by_query(query_string, false);
        	return false;
        })
    }
    
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
						$('#search_suggest').append($('<li>').text(value));
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