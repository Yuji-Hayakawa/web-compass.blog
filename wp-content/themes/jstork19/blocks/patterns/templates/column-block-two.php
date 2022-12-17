<?php

return array(
    'title'   => '2カラム テキスト',
    'categories' => array( 'stkpatterncat_section' ),
    'content' => '
    <!-- wp:group {"align":"full","style":{"color":{"text":"#2e6889","background":"#f0f9ff"}}} -->
    <div class="wp-block-group alignfull has-text-color has-background" style="background-color:#f0f9ff;color:#2e6889"><!-- wp:heading {"className":"is-style-stylenone"} -->
    <h2 class="is-style-stylenone">Headding text...</h2>
    <!-- /wp:heading -->
    
    <!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column -->
    <div class="wp-block-column"><!-- wp:paragraph -->
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column -->
    
    <!-- wp:column -->
    <div class="wp-block-column"><!-- wp:paragraph -->
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div>
    <!-- /wp:group -->
    ',
);