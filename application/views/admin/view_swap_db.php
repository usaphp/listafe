<div class="table_w span-24">
	    
        <div class="group_nutrition">
            <div class="nutrition_category"><?php echo form_label('Nutritions_Products', '', array('class' => 'f_label'));?></div>
            <div class="nutrition_block">
            <?php
                echo form_open('/admin/swap_db/run_nutrition_product_from_nutr_data10');        
                echo form_label('get nutrition data from nut_data', '', array('class' => 'f_label'));
                echo form_label('total rows /current rows: '.$all_nutr_data.' / '.$all_nutritions_products, '', array('class' => 'f_label'));
                echo form_submit('run','Run export','class = "f_button green"');
                echo form_close();
                echo cleared_div();
                echo separator_div();
            ?>
            </div>
            <div class="nutrition_block">            
            <?php            
                echo form_open('/admin/swap_db/run_nutrition_product_from_tbl_product11');        
                echo form_label('get product_id from Products', '', array('class' => 'f_label'));
                echo form_label('count rows: '.$count_product, '', array('class' => 'f_label'));
                echo form_submit('run','Run export','class = "f_button green"');
                echo form_close();
                echo cleared_div();
                echo separator_div();
            ?>
            </div>
            <div class="nutrition_block">
            <?php
                echo form_open('/admin/swap_db/run_nutrition_product_from_tbl_nutrition12');        
                echo form_label('get nutrition_id from Nutritions', '', array('class' => 'f_label'));
                echo form_label('count rows: '.$count_nutrition, '', array('class' => 'f_label'));
                echo form_submit('run','Run export','class = "f_button green"');
                echo form_close();
                echo cleared_div();
                echo separator_div();            
            ?>            
            </div>
        </div>
        <div class="group_nutrition">
            <div class="nutrition_category"><?php echo form_label('Product_properties/langdesc', '', array('class' => 'f_label'));?></div>
            <div class="nutrition_block">
                <?php
                    echo form_open('/admin/swap_db/run_product_properties_from_langdesc00');        
                    echo form_label('get langdesc.Factor put in Product_Properties', '', array('class' => 'f_label'));
                    echo form_label('total rows/ current rows: '.$count_langdesc.' / '.$count_product_properties, '', array('class' => 'f_label'));
                    echo form_submit('run','Run export','class = "f_button green"');
                    echo form_close();
                    echo cleared_div();
                    echo separator_div();            
                ?>            
            </div>
            <div class="nutrition_block">
            <?php
                echo form_open('/admin/swap_db/run_properties_products');        
                echo form_label('get Product_properties(Factor,id), no_langual(Factor,NDB_Put) put in Products_Product_Properties', '', array('class' => 'f_label'));
                echo form_label('total rows / current rows: '.$count_no_langual.' / '.$count_products_product_properties, '', array('class' => 'f_label'));
                echo form_submit('run','Run export','class = "f_button green"');
                echo form_close();
                echo cleared_div();
                echo separator_div();            
            ?>            
            </div>
        </div>
        <div class="group_nutrition">
            <div class="nutrition_category"><?php echo form_label('Product_type', '', array('class' => 'f_label'));?></div>
            <div class="nutrition_block">
                <?php
                    echo form_open('/admin/swap_db/run_Product_type_from_Product_language20');        
                    echo form_label('get Languages_Products(product_id,name) put in type=>Products', '', array('class' => 'f_label'));
                    #echo form_label('current rows / total_rows: '.$count_langdesc.' / '.$count_product_properties, '', array('class' => 'f_label'));
                    echo form_submit('run','Run export','class = "f_button green"');
                    echo form_close();
                    echo cleared_div();
                    echo separator_div();
                ?>            
            </div>     
            <div class="nutrition_block">
                <?php
                    echo form_open('/admin/swap_db/run_Product_type_languages_from_Product_type21');        
                    echo form_label('get Product_types(product_id, name) put in name,product_type_id => Language_Products_types', '', array('class' => 'f_label'));
                    #echo form_label('current rows / total_rows: '.$count_langdesc.' / '.$count_product_properties, '', array('class' => 'f_label'));
                    echo form_submit('run','Run export','class = "f_button green"');
                    echo form_close();
                    echo cleared_div();
                    echo separator_div();            
                ?>            
            </div>
            <div class="nutrition_block">
                <?php
                    echo form_open('/admin/swap_db/run_Product_type_from_Product_category30');        
                    echo form_label('get Product_category gut in Product_type', '', array('class' => 'f_label'));
                    #echo form_label('current rows / total_rows: '.$count_langdesc.' / '.$count_product_properties, '', array('class' => 'f_label'));
                    echo form_submit('run','Run export','class = "f_button green"');
                    echo form_close();
                    echo cleared_div();
                    echo separator_div();            
                ?>            
            </div>
        </div>
        <div class="group_nutrition">
            <div class="nutrition_category"><?php echo form_label('food_des/Product', '', array('class' => 'f_label'));?></div>
            <div class="nutrition_block">
                <?php
                    echo form_open('/admin/swap_db/run_product_from_food_des');        
                    echo form_label('get food_des(NDB_No,FdGrp_CD,Long_shrt) put in Products', '', array('class' => 'f_label'));
                    echo form_label('current rows / total_rows: '.$count_products.' / '.$count_food_des, '', array('class' => 'f_label'));
                    echo form_submit('run','Run export','class = "f_button green"');
                    echo form_close();
                    echo cleared_div();
                    echo separator_div();
                ?>            
            </div>
        </div>        
</div>