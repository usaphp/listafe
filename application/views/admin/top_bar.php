<div class="span-24" id="top_bar_w">
    <?php 
        #echo anchor('', img('/images/logo_admin_small.png',FALSE, array('alt' => 'Listofe.com')), array('id' => 'logo_small'));
        echo anchor($this->linker->a_logout_link(), 'Logout', array('id' => 'logout'));
    ?>
</div>