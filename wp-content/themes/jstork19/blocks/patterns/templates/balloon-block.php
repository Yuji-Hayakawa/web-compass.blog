<?php

return array(
    'title'   => '吹き出し',
    'categories' => array( 'stkpatterncat_section' ),
    'content' => '
    <!-- wp:group {"align":"full","style":{"color":{"background":"#57bdcf"}},"textColor":"very-light-gray","className":"stk-pd-default","paddingSetting":"stk-pd-default"} -->
<div class="wp-block-group alignfull stk-pd-default has-very-light-gray-color has-text-color has-background" style="background-color:#57bdcf"><!-- wp:heading {"textAlign":"center","className":"has-text-align-center is-style-stylenone"} -->
<h2 class="has-text-align-center is-style-stylenone">Lorem Ipsum</h2>
<!-- /wp:heading -->

<!-- wp:stk-plugin/voicecomment {"commentdesign":"comment_white","iconcolor":"icon_color_none"} -->
<div class="wp-block-stk-plugin-voicecomment voice comment_white l icon_color_none"><figure class="icon"></figure><div class="voicecomment"><!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:stk-plugin/voicecomment -->

<!-- wp:stk-plugin/voicecomment {"commentdesign":"comment_white","alignment":"r","iconcolor":"icon_color_none"} -->
<div class="wp-block-stk-plugin-voicecomment voice comment_white r icon_color_none"><figure class="icon"></figure><div class="voicecomment"><!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:stk-plugin/voicecomment --></div>
<!-- /wp:group -->
    ',
);