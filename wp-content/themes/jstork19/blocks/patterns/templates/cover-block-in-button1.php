<?php

return array(
    'title'   => 'カバー1',
    'categories' => array( 'stkpatterncat_section' ),
    'content' => '
    <!-- wp:cover {"url":"'.get_theme_file_uri('blocks/patterns/images/cover-block-in-button-bg01.jpeg').'","id":9,"dimRatio":90,"minHeight":50,"minHeightUnit":"vh","customGradient":"linear-gradient(135deg,rgb(93,205,208) 0%,rgb(57,64,89) 98%)","align":"full"} -->
    <div class="wp-block-cover alignfull has-background-dim-90 has-background-dim has-background-gradient" style="min-height:50vh"><span aria-hidden="true" class="wp-block-cover__gradient-background" style="background:linear-gradient(135deg,rgb(93,205,208) 0%,rgb(57,64,89) 98%)"></span><img class="wp-block-cover__image-background wp-image-9" alt="" src="'.get_theme_file_uri('blocks/patterns/images/cover-block-in-button-bg01.jpeg').'" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group -->
    <div class="wp-block-group"><!-- wp:heading {"level":1,"align":"center","className":"has-text-align-center is-style-stylenone"} -->
    <h1 class="has-text-align-center is-style-stylenone"><span class="span-stk-fs-l"><span class="gf">HELLO WORLD!</span></span></h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"is-style-default"} -->
    <p class="has-text-align-center is-style-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->

    <!-- wp:buttons {"contentJustification":"center","className":"is-style-default"} -->
    <div class="wp-block-buttons is-content-justification-center is-style-default"><!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color">Button</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div></div>
    <!-- /wp:cover -->
    ',
);