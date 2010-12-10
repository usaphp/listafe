<div class="group_nutrition">
    <div class="nutrition_category"> Nutrition Facts </div>
    <table class="nutrition_block">
        <tr>
            <th>Name</th>
            <th>weight</th>
        </tr>
        <?php foreach($dm_nutritions as $nutrition):?>
        <tr>            
            <td class="nutrition_name"> <?php echo $nutrition->join_name;?></td>
            <td class="nutrition_weight"> <?php echo $nutrition->join_value.' '.$nutrition->units; ?></td>
            
        </tr>
        <?php endforeach;?>
        
    </table>
</div>       