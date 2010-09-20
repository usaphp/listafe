function tmain(){
    tmain.prototype.ajax_call_link = '/index.php?action=ajax_call&call_for=';
    
    tmain.prototype.top_menu_init = function(){
        $("ul.dropdown li").hover(function(){
            $(this).addClass("hover");
            $('ul:first',this).css('visibility', 'visible');
        }, function(){
            $(this).removeClass("hover");
            $('ul:first',this).css('visibility', 'hidden');
        });
        $("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");
    }
    
    tmain.prototype.lense_modal_init = function(){
        $('.m_mat_select').click(function(){
            var mat_id = $(this).attr('id').replace('m_material_', '');
            var type_id = $('#m_lense_type').val();
            $('#lense_mat_select_' + type_id).val(mat_id);
            $('#lense_mat_active_' + type_id).hide();
            $('#lense_mat_inactive_' + type_id).show();
            $('#lense_opt_active_'+ type_id).show();
            $.fancybox.resize();
        });
        
        $('.m_opt_select').click(function(){
            var cbox = $(this).find('.m_opt_checkbox');
            if((cbox).is(':checked')){
                $(this).removeClass('selected');
                $(this).find('.m_opt_checkbox').attr('checked', false);
            }else{
                $(this).addClass('selected');
                $(this).find('.m_opt_checkbox').attr('checked', true);   
            }
        });
        
        $('.lm_submit_button').click(function(){
            var type_id = $(this).attr('id').replace('lm_submit_button_','');
            $('#lm_form_'+type_id).ajaxSubmit({
                url : tmain.prototype.ajax_call_link+'lense_confirm',
                type : "POST",
                data : {'type_id': $('#m_lense_type').val()},
                success : function(){
                    $.fancybox.close();                
                }
            });
        })
        
        $('#m_lense_opt_submit').click(function(){
            var type_id = $('#m_lense_type').val();
            $('#lense_opt_active_'+ type_id).hide();
            $('#lense_opt_inactive').show();
        })
        $('.m_cancel').click(function(){
            $.fancybox.close();
            return false;
        });
        $('.lm_info').tipTip();
    }
    
    tmain.prototype.item_info_init = function(){
        $('#i_main_image').fancybox();
        //click on color photo - changes the main picture src and also changes a source for fancybox original image
        $('a.i_sub_photo_w').click(function(){
            var image_url = $(this).attr('href');
            var original_image_url = image_url.replace('_500.','.');
            $('#i_main_image').attr('href', original_image_url);
            $('#i_main_image img').attr('src', image_url);
            return false;
        });
        $('#i_cs_select').change(function(){
            $.fancybox.showActivity();
            $.ajax({
                url: tmain.prototype.ajax_call_link+'get_sizes_for_color',
                data: {'col_id': $('#i_cs_select').val(), 'prod_id': $('#id_product').val()},
                success: function(response){
                    $.fancybox.hideActivity();
                    $('#i_set_select_w').html(response);
                    return false;
                }
            });
        });
        $('#i_ls_select').change(function(){
            if(!$(this).val()) return false;
            $.fancybox({
                href: tmain.prototype.ajax_call_link+'get_lense_modal&type_id='+$(this).val()
            })
        });
    }
    
    tmain.prototype.roller_init = function(){
        $('#roller_container').serialScroll({
            items:'li', // Selector to the items ( relative to the matched elements, '#sections' in this case )
            //prev:'#slider_prev',// Selector to the 'prev' button (absolute!, meaning it's relative to the document)
            //next:'#slider_next',// Selector to the 'next' button (absolute too)
            axis:'xy',// The default is 'y' scroll on both ways
            //navigation:'#navigation li a',
            duration:700,// Length of the animation (if you scroll 2 axes and use queue, then each axis take half this time)
            force:true, // Force a scroll to the element specified by 'start' (some browsers don't reset on refreshes)
             offset:-545,
            start:3,
            //queue:false,// We scroll on both axes, scroll both at the same time.
            //event:'click',// On which event to react (click is the default, you probably won't need to specify it)
            //stop:false,// Each click will stop any previous animations of the target. (false by default)
            //lock:true, // Ignore events if already animating (true by default)        
            //start: 0, // On which element (index) to begin ( 0 is the default, redundant in this case )        
            //cycle:true,// Cycle endlessly ( constant velocity, true is the default )
            step:3, // How many items to scroll each time ( 1 is the default, no need to specify )
            //jump:true, // If true, items become clickable (or w/e 'event' is, and when activated, the pane scrolls to them)
            lazy:false// (default) if true, the plugin looks for the items on each event(allows AJAX or JS content, or reordering)
            //interval:1000, // It's the number of milliseconds to automatically go to the next
            //constant:true, // constant speed
        });
        $("#roller_prev").click(function(){$('#roller_container').trigger( 'prev' );return false;});
        $("#roller_next").click(function(){$('#roller_container').trigger( 'next' );return false;});
    }
    
    tmain.prototype.banner_init = function(){
            $('#banners_container').serialScroll({
            items:'li', // Selector to the items ( relative to the matched elements, '#sections' in this case )
            //prev:'#slider_prev',// Selector to the 'prev' button (absolute!, meaning it's relative to the document)
            //next:'#slider_next',// Selector to the 'next' button (absolute too)
            axis:'xy',// The default is 'y' scroll on both ways
            //navigation:'#navigation li a',
            duration:700,// Length of the animation (if you scroll 2 axes and use queue, then each axis take half this time)
            force:true, // Force a scroll to the element specified by 'start' (some browsers don't reset on refreshes)
            //offset:-583,
            start:0,
            //queue:false,// We scroll on both axes, scroll both at the same time.
            //event:'click',// On which event to react (click is the default, you probably won't need to specify it)
            //stop:false,// Each click will stop any previous animations of the target. (false by default)
            //lock:true, // Ignore events if already animating (true by default)        
            //start: 0, // On which element (index) to begin ( 0 is the default, redundant in this case )        
            cycle:true,// Cycle endlessly ( constant velocity, true is the default )
            //step:3, // How many items to scroll each time ( 1 is the default, no need to specify )
            //jump:true, // If true, items become clickable (or w/e 'event' is, and when activated, the pane scrolls to them)
            //lazy:true,// (default) if true, the plugin looks for the items on each event(allows AJAX or JS content, or reordering)
            interval:8000 // It's the number of milliseconds to automatically go to the next
            //constant:true, // constant speed
            
        });
        $('#banner_navigation>ul>li').click(function(){
            var id = $(this).attr('id').replace('goto_banner_','') - 1;
            $('#banners_container').trigger( 'goto', [ id ] );
        });
        //$("#slider_prev").click(function(){$('#slider').trigger( 'prev' );return false;});
        //$("#slider_next").click(function(){$('#slider').trigger( 'next' );return false;});
    }
    
    tmain.prototype.top_brands_init = function(){
        //$('#top_brands').slideUp('slow');
    }
    
    tmain.prototype.home_init = function(){
        this.roller_init();
        this.banner_init();
    }
    
    tmain.prototype.catalog_init = function(){
        this.top_brands_init();
    }
}