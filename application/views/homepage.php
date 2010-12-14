
<div class='container'>
    <div class="span-24 mp_big_logo">
    	<img src='/images/site/big_logo.png' alt='Listafe.com'/>
    </div>
    <div class='span-4'>&nbsp;
    	<div class='left_hider' style='display:none'>
    		<a href='<?php echo base_url(); ?>'><img src='/images/site/small_logo.png' alt='Listafe.com' /></a>
    	</div>
    </div>
    <div class='span-16'>
        <div class="mp_search_wrapper">
            <?php $this->load->view('shared/main_search');?>
		</div>
        <div>
            <?php $this->load->view('header/crumbs',array('crumbs'=>$crumbs))?></div>
        <div>
		<div id='search_results_holder' style='display:none'></div>
	</div>
	<div class='span-4 last'>&nbsp;</div>
</div>