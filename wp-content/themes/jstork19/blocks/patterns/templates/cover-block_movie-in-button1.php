<?php

return array(
    'title'   => 'カバー 動画背景1',
    'categories' => array( 'stkpatterncat_section' ),
    'content' => '
    <!-- wp:cover {"url":"'.get_theme_file_uri('blocks/patterns/images/cover-block_movie-in-button1-bg.mp4').'","id":8590,"dimRatio":60,"overlayColor":"black","backgroundType":"video","minHeight":80,"minHeightUnit":"vh","align":"full","style":{"color":{}}} -->
    <div class="wp-block-cover alignfull" style="min-height:80vh"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-60 has-background-dim"></span><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="'.get_theme_file_uri('blocks/patterns/images/cover-block_movie-in-button1-bg.mp4').'" data-object-fit="cover"></video><div class="wp-block-cover__inner-container"><!-- wp:group -->
    <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"className":"has-text-align-center is-style-stylenone"} -->
    <h1 class="has-text-align-center is-style-stylenone"><span class="gf"><span class="gf">Lorem Ipsum</span></span></h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","className":"is-style-default"} -->
    <p class="has-text-align-center is-style-default">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
    <!-- /wp:paragraph --></div>
    <!-- /wp:group -->

    <!-- wp:buttons {"className":"is-style-default","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
    <div class="wp-block-buttons is-style-default"><!-- wp:button {"backgroundColor":"white","textColor":"black","className":"is-style-fill"} -->
    <div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-black-color has-white-background-color has-text-color has-background">Button</a></div>
    <!-- /wp:button -->

    <!-- wp:button {"textColor":"white","className":"is-style-outline"} -->
    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color">Button</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div></div>
    <!-- /wp:cover -->
    ',
);