<?php

return array(
    'title'   => 'CTAボタン',
    'categories' => array( 'stkpatterncat_section' ),
    'content' => '
    <!-- wp:group {"customBackgroundColor":"#ff8383","textColor":"very-light-gray","align":"full"} -->
    <div class="wp-block-group alignfull has-very-light-gray-color has-text-color has-background" style="background-color:#ff8383"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center","className":"is-style-stylenone"} -->
    <h2 class="has-text-align-center is-style-stylenone">Lorem Ipsum</h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"align":"center","className":"is-style-big"} -->
    <div class="wp-block-buttons aligncenter is-style-big"><!-- wp:button {"textColor":"very-light-gray","gradient":"light-green-cyan-to-vivid-green-cyan","className":"is-style-fill"} -->
    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-text-color has-very-light-gray-color has-background has-light-green-cyan-to-vivid-green-cyan-gradient-background">Button</a></div>
    <!-- /wp:button -->

    <!-- wp:button {"gradient":"blush-light-purple","className":"is-style-fill"} -->
    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-background has-blush-light-purple-gradient-background">Button</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div></div>
    <!-- /wp:group -->
    ',
);