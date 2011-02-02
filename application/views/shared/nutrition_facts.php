<div class='nutrition_facts'>
	<h4>Nutrition Facts</h4>
	<div>Serving Size 100 grams</div>
	<div>&nbsp;</div>
	<ul class='nutrition_facts_ul'>
		<li class='bold_border'>Amount Per Serving</li>
		<li><span class='f_l'><strong>Calories</strong> <?php echo isset($dm_nutritions->data->energ_kcal)?$dm_nutritions->data->energ_kcal['value']:'~'; ?></span><span class='f_r'>Calories from Fat 6</span><div class='clear'></div></li>
		<li class='medium_border'><span class='f_l'><strong>% Daily Value*</strong></span><div class='clear'></div></li>
		<li><span class='f_l'><strong>Total Fat</strong> <?php echo isset($dm_nutritions->data->fat)?$dm_nutritions->data->fat['value'].' '.$dm_nutritions->data->fat['units']:'~'; ?></span><span class='f_r'>1%</span><div class='clear'></div></li>
		<li class='second_level'><span class='f_l'>Saturated Fat <?php echo isset($dm_nutritions->data->fasat)?$dm_nutritions->data->fasat['value'].' '.$dm_nutritions->data->fasat['units']:'~'; ?></span><span class='f_r'>1%</span><div class='clear'></div></li>
		<li class='second_level'><span class='f_l'>Trans Fat <?php echo isset($dm_nutritions->data->fatrn)?$dm_nutritions->data->fatrn['value'].' '.$dm_nutritions->data->fatrn['units']:'~'; ?></span><span class='f_r'></span><div class='clear'></div></li>
		<li><span class='f_l'><strong>Cholesterol</strong> <?php echo isset($dm_nutritions->data->chole)?$dm_nutritions->data->chole['value'].' '.$dm_nutritions->data->chole['units']:'~'; ?></span><span class='f_r'>1%</span><div class='clear'></div></li>
		<li><span class='f_l'><strong>Sodium</strong> <?php echo isset($dm_nutritions->data->na)?$dm_nutritions->data->na['value'].' '.$dm_nutritions->data->na['units']:'~'; ?></span><span class='f_r'>21%</span><div class='clear'></div></li>
		<li><span class='f_l'><strong>Total Carbohydrate</strong> <?php echo isset($dm_nutritions->data->carbo)?$dm_nutritions->data->carbo['value'].' '.$dm_nutritions->data->carbo['units']:'~'; ?></span><span class='f_r'>1%</span><div class='clear'></div></li>
		<li class='second_level'><span class='f_l'>Dietary Fiber <?php echo isset($dm_nutritions->data->fiber)?$dm_nutritions->data->fiber['value'].' '.$dm_nutritions->data->fiber['units']:'~'; ?></span><span class='f_r'>1%</span><div class='clear'></div></li>
		<li class='second_level'><span class='f_l'>Sugars <?php echo isset($dm_nutritions->data->sugar)?$dm_nutritions->data->sugar['value'].' '.$dm_nutritions->data->sugar['units']:'~'; ?></span><span class='f_r'></span><div class='clear'></div></li>
		<li><span class='f_l'><strong>Protein</strong> <?php echo isset($dm_nutritions->data->protein)?$dm_nutritions->data->protein['value'].' '.$dm_nutritions->data->protein['units']:'~'; ?></span><div class='clear'></div></li>
		<li class='bold_border'>
			<div class='f_l'>Vitamin A <?php echo isset($dm_nutritions->data->vita_rae)?$dm_nutritions->data->vita_rae['value'].' '.$dm_nutritions->data->vita_rae['units']:'~'; ?></div>
			<div class='f_r'>Vitamin C<?php echo isset($dm_nutritions->data->vitc)?$dm_nutritions->data->vitc['value'].' '.$dm_nutritions->data->vitc['units']:'~'; ?></div>
			<div class='clear'></div>
		</li>
	</ul>
	<div>*Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs.</div>
</div>