<?php

return array(
    'title'   => 'カバー2',
    'categories' => array( 'stkpatterncat_section' ),
    'content' => '
    <!-- wp:cover {"url":"'.get_theme_file_uri('blocks/patterns/images/cover-block-in-button2-bg01.jpeg').'","id":9,"dimRatio":60,"overlayColor":"black","minHeight":50,"minHeightUnit":"vh","align":"full"} -->
    <div class="wp-block-cover alignfull" style="min-height:50vh"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-9" alt="" src="'.get_theme_file_uri('blocks/patterns/images/cover-block-in-button2-bg01.jpeg').'" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"className":"has-text-align-center is-style-stylenone"} -->
    <h1 class="has-text-align-center is-style-stylenone">SAMPLE TEXT</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"is-style-default"} -->
    <p class="has-text-align-center is-style-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->

    <!-- wp:buttons {"className":"is-style-default","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
    <div class="wp-block-buttons is-style-default"><!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color">Button</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div></div>
    <!-- /wp:cover -->
    ',
);