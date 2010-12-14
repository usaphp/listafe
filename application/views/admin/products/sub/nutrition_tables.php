<?php foreach($dm_nutrition_categories as $category):?>
    <div class="group_nutrition span-7">
        <div class="nutrition_category"><?php echo $category->join_name;?></div>
        <?php foreach($dm_product->nutrition as $nutrition):
            if($nutrition->nutrition_category_id == $category->id) {?>
                <div class="nutrition_block">
                    <div class="nutrition_name"> <?php echo $nutrition->join_name;?></div>
                    <div class="nutrition_weight"> <?php echo $nutrition->value.' '.$nutrition->units; ?></div>
                    <div class="clear"></div>
                </div>
            <?php } ?>
        <?php endforeach;?>
    </div>            
<?php endforeach;?>