<?php if(count($crumbs) > 1): ?>
<div>
	<ul class="breadcrumbs_top">
		<?php foreach($crumbs as $crumb): ?>
			<li>
				<?php 
					# crumb link is not false then show it as "a" tag 
					if($crumb['link']): 
						echo anchor($crumb['link'], $crumb['name'], array('class' => 'crumb')). '&gt;';
					else: 
						echo $crumb['name'];
					endif; 
				?>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class='clear'></div>
</div>
<?php endif; ?>
